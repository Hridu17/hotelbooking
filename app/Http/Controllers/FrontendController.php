<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomsModels\StandardRoom;
use App\Models\RoomsModels\DeluxeRoom;
use App\Models\RoomsModels\FamilyRoom;
use App\Models\RoomsModels\ExecutiveRoom;
use App\Models\event;

class FrontendController extends Controller
{
    public function index()
    {
        return view('hotel.index', [
            'standardRooms' => StandardRoom::all(),
            'deluxeRooms' => DeluxeRoom::all(),
            'familyRooms' => FamilyRoom::all(),
            'executiveRooms' => ExecutiveRoom::all(),
            'events' => Event::latest()->take(4)->get(), // for Events section if needed
        ]);
    }
}
