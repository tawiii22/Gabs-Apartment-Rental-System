<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationDate;
use Illuminate\Http\Request;

class ReservationDateController extends Controller
{
    //
    public function store(Reservation $reservation, Request $request) {

        $request->validate([
            'booked_date' => 'required',
            'payment' => 'required',
        ]);

        ReservationDate::create([
            'reservation_id' => $reservation->id,
            'booked_date' => $request->date,
            'status' => $request->remarks,
            'payment' => $request->payment
        ]);
        return back();
    }
}
