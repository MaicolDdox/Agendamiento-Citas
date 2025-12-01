<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with('user')
            ->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('appointments.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'      => ['required', 'exists:users,id'],
            'scheduled_at' => ['required', 'date'],
            'status'       => ['required', 'string', 'max:50'],
            'notes'        => ['nullable', 'string'],
        ]);

        Appointment::create($validated);

        return redirect()
            ->route('appointments.index')
            ->with('succes', 'Cita asignada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $users = User::orderBy('name')->get();
        return view('appointments.edit', compact('users', 'appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'user_id'      => ['sometimes', 'exists:users,id'],
            'scheduled_at' => ['sometimes', 'date'],
            'status'       => ['sometimes', 'string', 'max:50'],
            'notes'        => ['nullable',  'string'],
        ]);

        $appointment->update($validated);

        return redirect()
            ->route('appointments.index')
            ->with('succes', 'Cita editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('succes', 'Cita eliminada con exito');
    }
}
