<?php

namespace App\Http\Controllers;
use App\Models\GuestHouses;
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
            return view('admin.rooms', ['rooms' => GuestHouses::where('room_gender', $gender)->get()]);
        }

        return view('admin.rooms', ['rooms' => GuestHouses::all()]);
        
    }
    public function pending() {
        return view('admin.pending', ['reservations' => Reservation::where('status', 'pending')->get()]);
        
    }
    public function monitoring() {
        return view('admin.monitoring');
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
