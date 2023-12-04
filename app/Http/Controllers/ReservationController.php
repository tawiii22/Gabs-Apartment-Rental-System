<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Listing;
use App\Models\Reservation;
use App\Models\ReservationDate;
use DateTime;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class ReservationController extends Controller
{
    //
    public function store(Request $request) {
        $reservation = $request->validate([
            'room_id' => 'required',
            'fullname' => 'required',
            'email' => 'required|unique:reservations',
            'contact_no' => 'required|unique:reservations',
            'gender' => 'required',
            'bed_number' => 'required',
        ]);

        $reservation['status'] = 'pending';
        $reservation = Reservation::create($reservation);
        $reservation->room = Listing::find($request->room_id);

        // $reservation_dates = [
        //     'reservation_id' => $reservation->id,
        //     'booked_date' => $reservation->created_at,
        //     'status' => 'paid',

        // ];
        // ReservationDate::create($reservation_dates);

        return view('users.confirmation', ['reservation' => $reservation]);
    }

    public function approve(Reservation $reservation) {
        $bed = Bed::where('room_id', $reservation->room_id)->where('bed_number', $reservation->bed_number)->first();
        $bed->status = 0;
        $bed->update();
        $reservation->status = 'approved';
        $reservation->update();
        return redirect('/admin/transactions');
    }

    public function cancel(Reservation $reservation) {
        $reservation->status = 'cancelled';
        $reservation->update();
        return redirect('/admin/view-cancel');
    }

    public function delete(Request $request) {
        Reservation::destroy($request->id);
        return response()->json(['response' => 'EURT BHIE!', 'request' => $request->all()]);
    }

    public function sort(Request $request, $sort) {
        $query = Reservation::query();

        switch($sort) {
            case 'pending':
                $query->where('status', 'pending');
                break;
            case 'cancelled':
                $query->where('status', 'cancelled');
                break;
            case 'approved':
                $query->where('status', 'approved');
                break;
            case 'all':
                break;
        }

        if(auth()->user()->role == "admin") {
            $reservations = $query->with('guest_house')->get();
        }
        else {
            $query->where('user_id', auth()->user()->id);
            $reservations = $query->with('guest_house')->get();
        }

        return view('dashboard.reservation',(['reservations' => $reservations]));
    }

    

}
