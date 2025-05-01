<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::query();

        if (isset($request->search) && $request->search) {
            $request->name ? $query->where('name', 'like', '%' . $request->name . '%') : '';
            $request->date_event ? $query->whereYear('date_event', $request->date_event) : '';
        }
        $events = $query->orderBy('name')->paginate(20);

        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'uf' => 'required|string|max:2',
            'date_event' => 'required|date',
            'city' => 'string|max:100',
            'address' => 'string|max:300',
        ]);

        $event = new Event();
        $event->entidade_id = auth()->user()->entidade_id;
        $event->user_id = auth()->user()->id;
        $event->name = $request->input('name');
        $event->uf = $request->input('uf');
        $event->date_event = $request->input('date_event');
        $event->city = $request->input('city');
        $event->address = $request->input('address');
        $event->save();

        return redirect()->route('events.index')->with('success', 'Encontro cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        return view('events.create', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'uf' => 'required|string|max:2',
            'date_event' => 'required|date',
            'city' => 'string|max:100',
            'address' => 'string|max:300',
        ]);

        $event->entidade_id = auth()->user()->entidade_id;
        $event->user_id = auth()->user()->id;
        $event->name = $request->input('name');
        $event->uf = $request->input('uf');
        $event->date_event = $request->input('date_event');
        $event->city = $request->input('city');
        $event->address = $request->input('address');
        $event->save();

        return redirect()->route('events.index')->with('success', 'Encontro atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
