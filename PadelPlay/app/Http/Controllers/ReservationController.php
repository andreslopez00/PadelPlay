<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $courts = Court::all();
        $availableSlots = [];

        // Horarios disponibles (cada 1h30min desde las 08:00 hasta las 21:00)
        $timeSlots = [
            "08:00 - 09:30", "09:30 - 11:00", "11:00 - 12:30", "12:30 - 14:00",
            "14:00 - 15:30", "15:30 - 17:00", "17:00 - 18:30", "18:30 - 20:00", "20:00 - 21:30"
        ];

        foreach ($courts as $court) {
            // Obtener horarios ya reservados
            $reservedSlots = Reservation::where('court_id', $court->id)
                ->pluck('time_slot')
                ->toArray();

            // Filtramos horarios disponibles
            $availableSlots[$court->id] = array_values(array_diff($timeSlots, $reservedSlots));
        }

        return view('services', compact('courts', 'availableSlots'));
    }

    public function reserve(Request $request)
    {
        $request->validate([
            'court_id' => 'required|exists:courts,id',
            'time_slot' => 'required',
        ]);

        // Verificar si ya está reservada
        $existingReservation = Reservation::where('court_id', $request->court_id)
            ->where('time_slot', $request->time_slot)
            ->exists();

        if ($existingReservation) {
            return response()->json(['error' => 'Este horario ya está reservado'], 400);
        }

        // Crear la reserva
        Reservation::create([
            'court_id' => $request->court_id,
            'time_slot' => $request->time_slot,
        ]);

        return response()->json(['success' => true, 'message' => 'Reserva confirmada. Pague en las instalaciones.']);
    }
}
