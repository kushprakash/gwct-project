<?php

namespace App\Http\Controllers;

use App\Models\PathshalaAttendance;
use App\Models\PathshalaStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PathshalaAttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pathshala-attendance-list|pathshala-attendance-create|pathshala-attendance-edit|pathshala-attendance-delete', ['only' => ['index','show']]);
        $this->middleware('permission:pathshala-attendance-create', ['only' => ['create','store']]);
        $this->middleware('permission:pathshala-attendance-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pathshala-attendance-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $class_level = $request->input('class_level');
        $attendance_date = $request->input('attendance_date', date('Y-m-d'));
        
        $students = collect();
        $attendances = collect();
        
        if ($class_level) {
            $query = PathshalaStudent::where('class_level', $class_level)->where('status', 'Active');
            
            // User wize filtering
            if (!Auth::user()->hasRole('Super Admin')) {
                $query->where('created_by', Auth::id());
            }
            
            $students = $query->get();
            
            // Get existing attendance for this date
            if ($students->count() > 0) {
                $attendances = PathshalaAttendance::whereIn('pathshala_student_id', $students->pluck('id'))
                    ->where('attendance_date', $attendance_date)
                    ->get()
                    ->keyBy('pathshala_student_id');
            }
        }

        return view('pathshala.attendance.index', compact('students', 'attendances', 'class_level', 'attendance_date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'attendance_date' => 'required|date',
            'class_level' => 'required|integer',
            'attendance' => 'required|array',
            'attendance.*' => 'required|in:Present,Absent,Leave'
        ]);

        $teacher_id = Auth::id();
        $date = $request->attendance_date;

        foreach ($request->attendance as $student_id => $status) {
            // Verify student belongs to this teacher if not admin
            $student = PathshalaStudent::find($student_id);
            if (!$student) continue;
            
            if (!Auth::user()->hasRole('Super Admin') && $student->created_by != $teacher_id) {
                continue;
            }

            PathshalaAttendance::updateOrCreate(
                [
                    'pathshala_student_id' => $student_id,
                    'attendance_date' => $date
                ],
                [
                    'status' => $status,
                    'teacher_id' => $teacher_id
                ]
            );
        }

        return redirect()->route('pathshala-attendance.index', [
            'class_level' => $request->class_level,
            'attendance_date' => $date
        ])->with('success', 'Attendance saved successfully.');
    }
}
