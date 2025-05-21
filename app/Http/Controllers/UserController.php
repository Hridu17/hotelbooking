<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $bookings = RoomBooking::where('email', Auth::user()->email)->latest()->get();

        return view('dashboard', compact('bookings'));
    }
}
