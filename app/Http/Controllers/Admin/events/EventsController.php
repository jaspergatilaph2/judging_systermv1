<?php

namespace App\Http\Controllers\Admin\events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    public function ViewEvents()
    {
        return view('admin.events.createEvent', [
            'ActiveTab' => 'events',
            'SubActiveTab' => 'create Events'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'eventsName' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'endtime' => 'required|date_format:H:i',
            'eventsText' => 'required|string',
        ]);

        // Create the event
        Events::create($request->all());

        return redirect()->route('admin.events.events')->with('success', 'Event created successfully.');
    }

    public function view()
    {
        $events =  Events::paginate(10);
        return view('admin.events.viewEvents', compact('events'), [
            'ActiveTab' => 'events',
            'SubActiveTab' => 'view Events'
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Events::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('admin.events.view')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.events.events')->with('success', 'Event deleted successfully.');
    }
}
