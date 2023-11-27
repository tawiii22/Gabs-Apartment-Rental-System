<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Listing;
use App\Models\Reservation;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function rooms(?string $gender = null) {
        if($gender) {
            return view('admin.rooms', ['rooms' => Listing::where('room_gender', $gender)->get()]);
        }

        $rooms = Listing::all();
        foreach($rooms as $room) {
            $room->beds = Bed::where('room_id', $room->id)->get();
        }

        return view('admin.rooms', ['rooms' => $rooms]);
        
    }
    public function pending() {
        return view('admin.pending', ['reservations' => Reservation::where('status', 'pending')->get()]);
        
    }
    public function monitoring() {
        return view('admin.monitoring', ['reservations' => Reservation::where('status', 'approved')->get()]);
    }
    public function transactions() {
        return view('admin.transaction', ['reservations' => Reservation::where('status', 'approved')->get()]);
        
    }
    public function view_cancel() {
        return view('admin.view-cancel', ['reservations' => Reservation::where('status', 'cancelled')->get()]);
        
    }
    public function history() {
        return view('admin.history');
        
    }
    public function inventory() {
        return view('admin.inventory');
        
    }
}
