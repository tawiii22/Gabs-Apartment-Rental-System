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
        $reservations = Reservation::where('status', 'cancelled')->get();
        foreach($reservations as $r) {
            $r->room = Listing::find($r->room_id);
            $r->booked_date = ReservationDate::where('reservation_id', $r->id);
        }
        return view('admin.view-cancel', ['reservations' => $reservations]);
        
    }
    public function history() {
        $reservations = Reservation::where('status', 'done')->get();
        foreach($reservations as $r) {
            $r->room = Listing::find($r->room_id);
            $r->booked_date = ReservationDate::where('reservation_id', $r->id)->get();
        }
        return view('admin.history', ['reservations' => $reservations]);
        
    }
    public function collections(Request $request) {

        $month = $request->month;
        // Assuming you have a 'date' column in your ReservationDate model
        $reservationDate = ReservationDate::whereMonth('booked_date', $month)->get();
    
        $total = 0;
    
        foreach($reservationDate as $r) {
            $r->reservation = Reservation::find($r->reservation_id);
            $r->room = Listing::find($r->reservation->room_id);
            $total += $r->payment;
        }
    
        return view('admin.collections', ['reservations' => $reservationDate, 'total' => $total]);
    }
    

    public function create_admin() {
        return view('admin.add-admin');
    }

    public function store(Request $request) {

        $currentUser = User::find(auth()->user()->id);
        $currentUser->delete();
        
        $user = $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        User::create($user);
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Successfully created');;
    }

}
