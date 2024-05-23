@extends('components.admin-layout')

@section('content')
<body style="background-color:  rgb(236, 236, 236)">
    
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-10">
                <div class="btn-group" role="group" aria-label="Room Filters">
                    <a href="/admin/rooms/for-boys" class="btn btn-primary mx-1">For boys</a>
                    <a href="/admin/rooms/for-girls" class="btn btn-primary">For girls</a>
                </div>
            </div>
            <div class="col-md-2">
                <a href="/admin/add-room" class="btn btn-dark btn-block">Add room</a>
            </div>
        </div>

        <div class="row mt-4">
            @foreach ($rooms as $room)
            @php 
            $room_image = explode(',', $room->room_image);
            @endphp
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img style="height: 275px" src="{{asset('images/'.$room_image[0])}}" class="card-img-top" alt="Room Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{$room->room_name}}</h5>
                        <p class="card-text">{{$room->room_details}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/edit-room/{{$room->id}}" class="btn btn-primary btn-sm rounded">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</body>
@endsection
