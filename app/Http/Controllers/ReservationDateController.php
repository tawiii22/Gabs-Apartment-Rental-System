<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationDate;
use Illuminate\Http\Request;

class ReservationDateController extends Controller
{
    //
    public function store(Reservation $reservation, Request $request) {
        ReservationDate::create([
            'reservation_id' => $reservation->id,
            'booked_date' => $request->date,
            'status' => 'paid'
        ]);
        return back();
    }
}
