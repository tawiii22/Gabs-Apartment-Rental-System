<?php

namespace App\Http\Controllers;

use App\Models\GuestHouses;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Provider\Image;

use function PHPSTORM_META\type;

class GuestHouseController extends Controller
{
    //show all guest houses
    public function index() {
        //dd(request('search'));

        $guesthouses = GuestHouses::latest()->filter(request(['search']))->get();

        return view('guesthouses.index', [
            'guesthouses' => $guesthouses
        ]);
    }

    //show singular guest house
    public function show(GuestHouses $id) {
        return view('guesthouses.show', ['guesthouse' => $id]);
    }

    //create guest house
    public function create() {
        return view('admin.add-room');
    }

    public function payment(Request $request, GuestHouses $guesthouse) {

        return view('guesthouses.payment', ['guesthouse' => $guesthouse]);
    }

    public function edit(GuestHouses $room) {
        return view('admin.edit-room', ['guesthouse' => $room]);
    }

    public function update(GuestHouses $room, Request $request) {
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

    public function destroy(GuestHouses $guesthouse) {
        $wishlist = Wishlist::where('room_id', $guesthouse->id)->get();
        $wishlist->each->delete();
        $guesthouse->delete();

        return redirect('/')->with('message', "GUEST HOUSE DELETED SUCCESSFULLY!");
    }

    //store guest hoseu data 
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
        }
        $form = $request->validate([
            'room_name' => 'required',
            'room_details' => 'required',
            'room_price' => 'required',
            'room_image' => 'required',
            'room_gender' => 'required'
        ]);

        $form['room_image'] = $houseImages;

        GuestHouses::create($form);

        return redirect('/admin/rooms')->with('message', ' GUEST HOUSE ADDED SUCCESSFULLY!');

    }

    

}