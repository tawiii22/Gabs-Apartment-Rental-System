@extends('components.admin-layout')

@section('content')
    transaction
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">Bed no.</th>
              <th scope="col">Name</th>
              <th scope="col">Contact #</th>
              <th scope="col">Room name</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <th scope="col">Date</th>
              <th scope="col">Payment</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <th scope="row">{{ $reservation->bed_number }}</th>
                <td>{{ $reservation->fullname }}</td>
                <td>{{ $reservation->contact_no }}</td>
                <td>{{ $reservation->room->room_name }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->gender }}</td>
                <td>{{ $reservation->created_at }}</td>
                <td>
                  <button class="btn btn-danger">
                      he
                  </button>
                  </td>
              </tr>
              
            @endforeach
          </tbody>
      </table>
@endsection