@extends('components.admin-layout')

@section('content')
    view cancel
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Contact #</th>
              <th scope="col">Room name</th>
              <th scope="col">Bed number</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <th scope="row">{{ $reservation->id }}</th>
                <td>{{ $reservation->fullname }}</td>
                <td>{{ $reservation->contact_no }}</td>
                <td>{{ $reservation->room->room_name }}</td>
                <td>{{ $reservation->bed_number }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->room->room_gender }}</td>
                <td>{{ $reservation->created_at }}</td>
                
              </tr>
              
            @endforeach
          </tbody>
      </table>
@endsection