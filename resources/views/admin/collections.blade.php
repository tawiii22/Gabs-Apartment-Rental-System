@extends('components.admin-layout')

@section('content')
    collections
  
      <form action="/admin/collections/" method="GET">
        @csrf
    <label for="">Start</label>
    <input type="date" name="start">
    <label for="">End</label>
    <input type="date" name="end">
    <button class="btn btn-primary" type="submit">Go</button>
  </form>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">Room name</th>
              <th scope="col">Bed number</th>
              <th scope="col">Payment</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($reservations as $reservation)
              <tr>
                <td>{{ $reservation->room->room_name }}</td>
                <td>{{ $reservation->reservation->bed_number }}</td>
                <td>{{ $reservation->payment }}</td>
              </tr>
              @endforeach
              <tr>
                <td class="text-end" colspan="2">Total</td>
                <td>{{ $total }}</td>
              </tr>
          </tbody>
      </table>
@endsection