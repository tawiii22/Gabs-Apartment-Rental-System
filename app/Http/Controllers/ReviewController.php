<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function store(Listing $listing, Request $request) {

        $request->validate([
            'rating' => 'required',
            'name' => 'required',
            'review' => 'required'
        ]);

        Review::create([
            'name' => $request->name,
            'room_id' => $listing->id,
            'review' => $request->review,
            'rating' => $request->rating
        ]);

        return back()->with('message', 'Ratings and review added.');
    }
}
