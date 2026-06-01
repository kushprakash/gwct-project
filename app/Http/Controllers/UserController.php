<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $states = State::where('status', 1)->get();
        return view('users.create', compact('roles', 'states'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:users',
            'email' => 'nullable|email|unique:users',
            'aadhaar' => 'nullable|string|unique:users',
            'user_type' => 'required|string',
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'block_id' => 'nullable|exists:blocks,id',
            'panchayat_id' => 'nullable|exists:panchayats,id',
            'village_id' => 'nullable|exists:villages,id',
        ]);

        $validated['password'] = Hash::make('123456'); // Default password
        $validated['parent_id'] = Auth::id(); // Dynamic parent mapping
        $validated['root_id'] = Auth::user()->root_id ?? Auth::id(); // Dynamic root mapping

        $user = User::create($validated);
        $user->assignRole($request->user_type);

        return redirect()->route('users.index')->with('success', 'User created successfully in the hierarchy chain.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = \Spatie\Permission\Models\Permission::orderBy('module_name')->get()->groupBy('module_name');
        
        // Direct permissions the user has (ignoring role permissions)
        $userDirectPermissions = $user->getDirectPermissions()->pluck('name')->toArray();
        
        return view('users.edit', compact('user', 'roles', 'permissions', 'userDirectPermissions'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:users,mobile,'.$user->id,
            'user_type' => 'required|string'
        ]);

        $user->update($validated);

        // Update Role
        $user->syncRoles([$request->user_type]);

        // Sync extra Direct Permissions
        if($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->syncPermissions([]);
        }

        return redirect()->route('users.index')->with('success', 'User profile and permissions updated successfully.');
    }
}
