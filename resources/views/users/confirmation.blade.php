@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1 class="mb-0">Confirmation</h1>
                </div>
                <div class="card-body">
                    <p class="lead">Thank you for booking with us! Here's your reservation details:</p>

                    <div class="receipt">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Customer Information</h4>
                                <hr>
                                <p><strong>Name:</strong> {{ $reservation->fullname }}</p>
                                <p><strong>Email:</strong> {{ $reservation->email }}</p>
                                <p><strong>Contact no.:</strong> {{ $reservation->contact_no }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Reservation Details</h4>
                                <hr>
                                <p><strong>Room Name:</strong> {{ $reservation->room->room_name }}</p>
                                <p><strong>Date:</strong> {{ $reservation->created_at }}</p>
                                <p><strong>Bed Number:</strong> {{ $reservation->bed_number }}</p>
                                <p><strong>Room Type:</strong> {{ $reservation->room->room_gender }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p class="text-danger">Note: Please take a screenshot for proof.</p>

                    <a href="/rooms/all" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
