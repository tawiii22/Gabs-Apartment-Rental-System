<?php

use App\Models\User;
use App\Models\Listing;
use App\Models\Wishlist;
use App\Models\GuestHouses;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationDateController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


Route::post('/reservation/confirm', [ReservationController::class, 'store']);
// Route::delete('/reservation/delete', [ReservationController::class, 'delete'])->middleware('auth');
// Route::put('/reservation/cancel', [ReservationController::class, 'cancel'])->middleware('auth');
// Route::get('/reservation/sort/{sort}', [ReservationController::class, 'sort'])->middleware('auth');

Route::post('/rooms/rate/{listing}', [ReviewController::class, 'store']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/rooms/{gender?}', [AdminController::class, 'rooms']);
Route::get('/admin/pending', [AdminController::class, 'pending']);
Route::get('/admin/transactions', [AdminController::class, 'transactions']);
Route::get('/admin/view-cancel', [AdminController::class, 'view_cancel']);
Route::get('/admin/history', [AdminController::class, 'history']);
Route::get('/admin/monitoring', [AdminController::class, 'monitoring']);
Route::get('/admin/collections', [AdminController::class, 'collections']);
Route::get('/admin/create-admin', [AdminController::class, 'create_admin']);
Route::post('/admin/create-admin', [AdminController::class, 'store']);
Route::get('/dashboard/reservations', [HomeController::class, 'show'])->middleware('auth');
Route::post('/admin/cancel-reservation/{reservation}', [ReservationController::class, 'cancel']);
Route::post('/admin/approve-reservation/{reservation}', [ReservationController::class, 'approve']);
Route::get('/admin/add-room', [ListingController::class, 'create']);
Route::get('/admin/edit-room/{room}', [ListingController::class, 'edit']);
Route::post('/admin/update-room/{room}', [ListingController::class, 'update']);
Route::post('/admin/guesthouses/create', [ListingController::class, 'store']);

Route::get('/about', function () {
    return view('about');
});


Route::get('/confirmation', function () {
    return view('users.confirmation');
});
Route::get('/', function () {
    return view('landing-page');
});
// Route::get('/rooms', function () {
//     return view('users.index', ['listings' => Listing::all()]);
// });
Route::get('/rooms/all/{gender?}', [ListingController::class, 'index']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/payment/{listing}', [ListingController::class, 'payment']);
Route::delete('/rooms/{guesthouse}', [ListingController::class, 'destroy']);
Route::get('/rooms/{listing}', [ListingController::class, 'show']);
Route::put('/rooms/update/{guesthouse}', [ListingController::class, 'update'])->middleware('auth');
Route::get('rooms/{guesthouse}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::get('rooms/{guesthouse}/delete', [ListingController::class, 'delete'])->middleware('auth');
Route::get('/guesthouses/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/reservation/add-date/{reservation}', [ReservationDateController::class, 'store']);

Route::get('/search', [SearchController::class, 'search']);


Route::get('/about', function() {
    return view('about');
});


Route::get('test', function() {
    return view('test');
});













// Route::get('/users', function(Request $request) {
//     dd($request);
//     return 'BOANGG';
// });

// Route::get('/update-user/{id}', function ($id) {
//     return response($id, 200);
// });

// Route::get('request-json', function () {
//     return response()->json(['name'=>'joren', 'nationality'=>'nigga']);
// });

// Route::get('download', function() {
//     $path = public_path().'\robots.txt';
//     $name = 'robots.txt';
//     return response()->download($path, $name);
// });

// Route::get('/create', function () {
//     return "BOANG";
// });

// Route::match(['post'], '/postget', function () {
//     return 'GET AND POST ALLOWED NIGGA';
// });
