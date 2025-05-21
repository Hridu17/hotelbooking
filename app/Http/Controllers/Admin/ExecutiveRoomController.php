<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomsModels\ExecutiveRoom;
use Illuminate\Support\Facades\Storage;

class ExecutiveRoomController extends Controller
{
    public function index()
    {
        $executiveRooms = ExecutiveRoom::all();
        return view('admin.pages.rooms.executiveroom.index', compact('executiveRooms'));
    }

    public function create()
    {
        return view('admin.pages.rooms.executiveroom.create');
    }

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

        ExecutiveRoom::create([
            'title' => $request->title,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'image_path' => $imagePath,
            'is_available' => $request->has('is_available'),
        ]);

        return redirect()->route('admin.rooms.executive.index')->with('success', 'Executive room created successfully!');
    }

    public function edit($id)
    {
        $room = ExecutiveRoom::findOrFail($id);
        return view('admin.pages.rooms.executiveroom.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = ExecutiveRoom::findOrFail($id);

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

        return redirect()->route('admin.rooms.executive.index')->with('success', 'Executive room updated successfully!');
    }

    public function destroy($id)
    {
        $room = ExecutiveRoom::findOrFail($id);

        if ($room->image_path) {
            Storage::disk('public')->delete($room->image_path);
        }

        $room->delete();

        return redirect()->route('admin.rooms.executive.index')->with('success', 'Executive room deleted successfully!');
    }
}
