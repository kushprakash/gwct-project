<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Block;
use App\Models\Panchayat;
use App\Models\Village;

class LocationController extends Controller
{
    public function getStates() {
        return response()->json(State::where('status', 1)->get());
    }

    public function getDistricts($state_id) {
        return response()->json(District::where('state_id', $state_id)->where('status', 1)->get());
    }

    public function getBlocks($district_id) {
        return response()->json(Block::where('district_id', $district_id)->where('status', 1)->get());
    }

    public function getPanchayats($block_id) {
        return response()->json(Panchayat::where('block_id', $block_id)->where('status', 1)->get());
    }

    public function getVillages($panchayat_id) {
        return response()->json(Village::where('panchayat_id', $panchayat_id)->where('status', 1)->get());
    }
}
