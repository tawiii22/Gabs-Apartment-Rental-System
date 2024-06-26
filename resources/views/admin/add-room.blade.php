@extends('master')
@section('title', 'Create Guest House')

@section('content')
<div class="container text-center bg-white">
   <form method="POST" action="/admin/guesthouses/create" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-around">
      <h1 class="mt-2">CREATE NEW ROOM</h1>

      <div class="col-8">
      <div class="form-group">
      <label for="roomName" class="mb-2">Room Name</label>
      <input type="text" class="form-control rounded-pill"  id="roomName" name="room_name" value="{{ old('room_name') }}" >
      @error('room_name')
          <p class="text-danger mt-1"> {{ $message }} </p>
      @enderror
    </div>

    <div class="form-group">
      <label for="room_image" class="mb-2">Room Images (minimum 5 images)</label>
      <input type="file" multiple class="form-control rounded-pill"  id="room_image" name="room_image[]" value="{{ old('room_image') }}" >
      @error('room_image')
          <p class="text-danger mt-1"> {{ $message }} </p>
      @enderror
    </div>
    
    <div class="form-group">
        <label for="roomDetails" class="mb-2">Room Description</label>
        <textarea class="form-control rounded" id="roomDetails" name="room_details" rows="3" > {{ old('room_details') }} </textarea>
        @error('room_details')
          <p class="text-danger mt-1"> {{ $message }} </p>
        @enderror
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-6">
              <label for="room_img" class="mb-2">Room gender</label>
              <select class="form-select" name="room_gender" aria-label="Default select example">
                <option value="for-boys">For boys</option>
                <option value="for-girls">For girls</option>
              </select>
                @error('room_gender')
                    <p class="text-danger mt-1"> {{ $message }} </p>
                @enderror
          </div>
            <div class="col-6">
                <label for="room_img" class="mb-2">Room Price</label>
                <input type="text" class="form-control rounded-pill" id="roomPrice" name="room_price" value="{{ old('room_price') }}">
                @error('room_price')
                    <p class="text-danger mt-1"> {{ $message }} </p>
                @enderror
            </div>
        </div>
      </div>
     
      <div class="form-group text-center mt-4">
        <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 mb-5">Create Room</button>
      </div>
        </div>
      </div>
   </form>
    
</div>


@endsection
