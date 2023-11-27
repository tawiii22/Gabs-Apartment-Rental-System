@extends('components.admin-layout')

@section('content')
<div class="row">
    <div class="row justify-content-end d-flex">
        <div class="col-10">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/admin/rooms/for-boys">
                    <button type="button" class="btn btn-primary">For boys</button>
                </a>
                <a href="/admin/rooms/for-girls">
                    <button type="button" class="btn btn-primary">For girls</button>
                </a>
              </div>
        </div>
        <div class="col-2">
            <a href="/admin/add-room">
                <button class="btn btn-success mb-4">Add room</button>
            </a>
        </div>
    </div>
    
    @foreach ($rooms as $room)
    @php 
            $room_image = explode(',', $room->room_image);
        @endphp

    <div class="card col-4 m-2" style="width: 18rem;">
        <img src="{{asset('images/'.$room_image[0])}}" class="card-img-top" height="200px" alt="...">
        <div class="card-body">
            {{$room->room_gender}}
          <h5 class="card-title">{{ $room->room_name }}</h5>
          <p class="card-text">{{ $room->room_details }}</p>
            @for ($i = 0; $i < count($room->beds); $i++)
                Bed {{$i+1}}
                <div class="row">
                   <div class="col-4">
                    <button class="btn btn-success btn-sm">Available</button>    
                </div>
                <div class="col-6">
                    <button class="btn btn-danger btn-sm">Not available</button>  </div>  
                </div>
            @endfor
            
          <a href="/admin/edit-room/{{$room->id}}">
              <button class="btn btn-primary mt-2">Edit</button>
            </a>
        </div>
      </div>

    @endforeach
</div>
@endsection