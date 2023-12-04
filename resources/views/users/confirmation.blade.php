@extends('master')

@section('content')

<div class="container text-center">

    <h1>CONFIRMATION</h1>
<h3>You've successfully booked your reservation throught online. You can visit our apartment for the payment.</h3>


<table class="table table-bordered border-primary">
    <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Contact no.</th>
          <th scope="col">Room name</th>
          <th scope="col">Date</th>
          <th scope="col">Bed number</th>
          <th scope="col">Gender</th>
        </tr>
      </thead>
      <tbody>
            <tr>
                <td>{{ $reservation->fullname }} </td>
                <td>{{ $reservation->email }} </td>
                <td>{{ $reservation->contact_no }} </td>
                <td>{{ $reservation->room->room_name }} </td>
                <td>{{ $reservation->created_at }} </td>
                <td>{{ $reservation->bed_number }} </td>
                <td>{{ $reservation->gender }} </td>
            </tr>
      </tbody>
  </table>

</div>

@endsection
