<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:20',
            'date'          => 'required|date',
            'time'          => 'required',
            'people_count'  => 'required|integer|min:1',
            'message'       => 'nullable|string',
        ]);

        $validated['payment_method'] = 'manual';
        $validated['status'] = 'pending';

        RoomBooking::create($validated);

        return redirect()->back()->with('success', 'Your booking has been submitted successfully!');
    }

    public function adminIndex()
    {
        $bookings = RoomBooking::latest()->paginate(20);
        return view('admin.pages.rooms.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = RoomBooking::findOrFail($id);
        return view('admin.pages.rooms.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,failed',
        ]);

        $booking = RoomBooking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.room.bookings')->with('success', 'Booking status updated.');
    }
}
