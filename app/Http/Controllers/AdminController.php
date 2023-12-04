<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Listing;
use App\Models\Reservation;
use App\Models\ReservationDate;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function rooms(?string $gender = null) {

        if($gender) {
            $rooms = Listing::where('room_gender', $gender)->get();
            foreach($rooms as $room) {
                $room->beds = Bed::where('room_id', $room->id)->get();
            }
            return view('admin.rooms', ['rooms' => $rooms]);
        }

        $rooms = Listing::all();
        foreach($rooms as $room) {
            $room->beds = Bed::where('room_id', $room->id)->get();
        }

        return view('admin.rooms', ['rooms' => $rooms]);
        
    }
    public function pending() {

        $reservations = Reservation::where('status', 'pending')->latest()->get();
        foreach($reservations as $r) {
            $r->room = Listing::find($r->room_id);
            $r->booked_date = ReservationDate::where('reservation_id', $r->id);
        }

        return view('admin.pending', ['reservations' => $reservations]);
        
    }
    public function monitoring() {

        $reservations = Reservation::where('status', 'approved')->get();
        foreach($reservations as $r) {
            $r->room = Listing::find($r->room_id);
            $r->booked_date = ReservationDate::where('reservation_id', $r->id)->get();
        }
        return view('admin.monitoring', ['reservations' => $reservations]);
    }
    public function transactions() {
        $reservations = Reservation::where('status', 'approved')->get();
        foreach($reservations as $r) {
            $r->room = Listing::find($r->room_id);
            $r->booked_date = ReservationDate::where('reservation_id', $r->id);
        }
        return view('admin.transaction', ['reservations' => $reservations]);
        
    }
    public function view_cancel() {
        return view('admin.view-cancel', ['reservations' => Reservation::where('status', 'cancelled')->get()]);
        
    }
    public function history() {
        return view('admin.history');
        
    }
    public function collections() {
        return view('admin.collections');
        
    }

    public function create_admin() {
        return view('admin.add-admin');
    }

    public function store(Request $request) {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        User::create($user);
        return back();
    }

}
