<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.pages.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('admin.pages.events.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Event::create([
            'topic' => $request->topic,
            'price' => $request->price,
            'content' => $request->content,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.events.index')->with('message', 'Event created successfully!');
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.pages.events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'topic' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($event->image && file_exists(public_path('uploads/' . $event->image))) {
                unlink(public_path('uploads/' . $event->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $event->image = $imageName;
        }

        $event->update([
            'topic' => $request->topic,
            'price' => $request->price,
            'content' => $request->content,
            'image' => $event->image, // update if changed
        ]);

        return redirect()->route('admin.events.index')->with('message', 'Event updated successfully!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete image from storage
        if ($event->image && file_exists(public_path('uploads/' . $event->image))) {
            unlink(public_path('uploads/' . $event->image));
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('message', 'Event deleted successfully!');
    }
}
