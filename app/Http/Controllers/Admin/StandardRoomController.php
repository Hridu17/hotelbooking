<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomsModels\StandardRoom;
use Illuminate\Support\Facades\Storage;

class StandardRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standardRooms = StandardRoom::all();
        return view('admin.pages.rooms.standardRoom.index', compact('standardRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.rooms.standardroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('uploads/rooms', 'public');
        }

        StandardRoom::create([
            'title' => $request->title,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'image_path' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.rooms.standard.index')->with('success', 'Standard room created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = StandardRoom::findOrFail($id);
        return view('admin.pages.rooms.standardroom.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $room = StandardRoom::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|max:2048',
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
            'capacity' => $request->capacity,
            'price' => $request->price,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.rooms.standard.index')->with('success', 'Standard room updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = StandardRoom::findOrFail($id);

        if ($room->image_path) {
            Storage::disk('public')->delete($room->image_path);
        }

        $room->delete();

        return redirect()->route('admin.rooms.standard.index')->with('success', 'Standard room deleted successfully!');
    }
}
