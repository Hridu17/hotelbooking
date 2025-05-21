<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomsModels\DeluxeRoom;
use Illuminate\Support\Facades\Storage;

class DeluxeRoomController extends Controller
{
    public function index()
    {
        $deluxeRooms = DeluxeRoom::all();
        return view('admin.pages.rooms.DeluxeRoom.index', compact('deluxeRooms'));
    }

    public function create()
    {
        return view('admin.pages.rooms.DeluxeRoom.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->hasFile('image_path')
            ? $request->file('image_path')->store('uploads/rooms', 'public')
            : null;

        DeluxeRoom::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'image_path' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.rooms.deluxe.index')->with('success', 'Deluxe room added successfully!');
    }

    public function edit($id)
    {
        $room = DeluxeRoom::findOrFail($id);
        return view('admin.pages.rooms.DeluxeRoom.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = DeluxeRoom::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            if ($room->image_path) {
                Storage::disk('public')->delete($room->image_path);
            }
            $room->image_path = $request->file('image_path')->store('uploads/rooms', 'public');
        }

        $room->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'is_available' => $request->has('is_available'),
            'image_path' => $room->image_path,
        ]);

        return redirect()->route('admin.rooms.deluxe.index')->with('success', 'Deluxe room updated successfully!');
    }

    public function destroy($id)
    {
        $room = DeluxeRoom::findOrFail($id);

        if ($room->image_path) {
            Storage::disk('public')->delete($room->image_path);
        }

        $room->delete();
        return redirect()->route('admin.rooms.deluxe.index')->with('success', 'Deluxe room deleted.');
    }
}
