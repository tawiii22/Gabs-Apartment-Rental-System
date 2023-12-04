<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Review;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    public function index(?string $gender = null) {
        if($gender) {
            $listings = Listing::where('room_gender', $gender)->latest()->get();
        }
        else {
            $listings = Listing::latest()->get();
        }
        foreach($listings as $listing) {
            $reviews = DB::table('reviews')->where('room_id', $listing->id)->sum('rating');
            $reviewsCount = DB::table('reviews')->where('room_id', $listing->id)->count();
            $listing->averageRating = $reviews / ($reviewsCount == 0 ? 1 : $reviewsCount);
        }
        return view('users.index', [
            'listings' => $listings
        ]);
    }

    public function show(Listing $listing) {

        $listing->beds = Bed::where('room_id', $listing->id)->get();
        $listing->reviews = Review::where('room_id', $listing->id)->get();
        return view('users.show', ['listing' => $listing]);
    }

    public function create() {
        return view('admin.add-room');
    }

    public function payment(Request $request, Listing $listing) {

        $listing->beds = Bed::where('room_id', $listing->id)->get();
        return view('users.payment', ['listing' => $listing]);
    }

    public function edit(Listing $room) {
        return view('admin.edit-room', ['listing' => $room]);
    }

    public function update(Listing $room, Request $request) {
        $houseImages = '';
        $uploadedFiles = $request->file('room_image');
        if($uploadedFiles == null) {
           $houseImages = $request->room_image;
        }
        else {
            for($i = 0; $i < count($uploadedFiles); $i++) {
                if($i != count($uploadedFiles)-1) {
                    $houseImages .= $uploadedFiles[$i]->getClientOriginalName().",";
                }
                else {
                    $houseImages .= $uploadedFiles[$i]->getClientOriginalName();
                }
            }
        }
        

        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_price' => 'required',
            'room_gender' => 'required',
            'room_image' => 'required|min:5'
        ]);
        $form['room_image'] = $houseImages;
        $room->room_name = $form['room_name'];
        $room->room_details = $form['room_details'];
        $room->room_gender = $form['room_gender'];
        $room->room_price = $form['room_price'];
        $room->room_image = $houseImages;

        $room->update($form);

        return redirect('/admin/rooms');
    }

    public function store(Request $request) {
        $houseImages = '';
        $uploadedFiles = $request->file('room_image');
        for($i = 0; $i < count($uploadedFiles); $i++) {
            if($i != count($uploadedFiles)-1) {
                $houseImages .= $uploadedFiles[$i]->getClientOriginalName().",";
            }
            else {
                $houseImages .= $uploadedFiles[$i]->getClientOriginalName();
            }
            $uploadedFiles[$i]->move(public_path('images/'), $uploadedFiles[$i]->getClientOriginalName());
        }
        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_price' => 'required',
            'room_image' => 'required',
            'room_gender' => 'required'
        ]);

        $form['room_image'] = $houseImages;

        $listing = Listing::create($form);
        for($i = 0; $i < 4; $i++) {
            $bed = [
                'room_id' => $listing->id,
                'bed_number' => $i+1,
                'status' => true
            ];
            Bed::create($bed);
        }
        return redirect('/admin/rooms')->with('message', ' ADDED SUCCESSFULLY!');

    }

    

}