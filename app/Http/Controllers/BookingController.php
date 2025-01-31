<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function showForm()
    {
        return view('booking-form'); // Ensure you create this view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required',
            'people' => 'required|integer|min:1',
            'payment' => 'required|string',
            'message' => 'nullable|string'
        ]);

        Booking::create($request->all());

        return redirect()->back()->with('success', 'Room booked successfully!');
    }
}
