<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;

class LocationMasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view location master', ['only' => ['index']]);
        $this->middleware('permission:create location master', ['only' => ['store']]);
        $this->middleware('permission:delete location master', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $activeTab = $request->query('tab', 'states');
        
        $states = State::all();
        $districts = District::with('state')->get();
        $blocks = Block::with('district.state')->get();
        $panchayats = Panchayat::with('block.district.state')->get();
        $villages = Village::with('panchayat.block.district.state')->get();

        return view('locations.index', compact('activeTab', 'states', 'districts', 'blocks', 'panchayats', 'villages'));
    }

    public function store(Request $request)
    {
        $type = $request->type;
        $request->validate(['name' => 'required|string|max:255']);

        switch ($type) {
            case 'state':
                State::create(['name' => $request->name, 'status' => 1]);
                $tab = 'states';
                break;
            case 'district':
                $request->validate(['state_id' => 'required|exists:states,id']);
                District::create(['name' => $request->name, 'state_id' => $request->state_id, 'status' => 1]);
                $tab = 'districts';
                break;
            case 'block':
                $request->validate(['district_id' => 'required|exists:districts,id']);
                Block::create(['name' => $request->name, 'district_id' => $request->district_id, 'status' => 1]);
                $tab = 'blocks';
                break;
            case 'panchayat':
                $request->validate(['block_id' => 'required|exists:blocks,id']);
                Panchayat::create(['name' => $request->name, 'block_id' => $request->block_id, 'status' => 1]);
                $tab = 'panchayats';
                break;
            case 'village':
                $request->validate(['panchayat_id' => 'required|exists:panchayats,id']);
                Village::create(['name' => $request->name, 'panchayat_id' => $request->panchayat_id, 'status' => 1]);
                $tab = 'villages';
                break;
            default:
                return back()->with('error', 'Invalid location type.');
        }

        return redirect()->route('locations.index', ['tab' => $tab])->with('success', ucfirst($type) . ' added successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $type = $request->query('type');
        try {
            switch ($type) {
                case 'state': State::findOrFail($id)->delete(); $tab = 'states'; break;
                case 'district': District::findOrFail($id)->delete(); $tab = 'districts'; break;
                case 'block': Block::findOrFail($id)->delete(); $tab = 'blocks'; break;
                case 'panchayat': Panchayat::findOrFail($id)->delete(); $tab = 'panchayats'; break;
                case 'village': Village::findOrFail($id)->delete(); $tab = 'villages'; break;
                default: return back()->with('error', 'Invalid location type.');
            }
            return redirect()->route('locations.index', ['tab' => $tab])->with('success', ucfirst($type) . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Cannot delete this ' . $type . ' as it is linked to other records.');
        }
    }
}
