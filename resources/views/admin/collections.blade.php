@extends('components.admin-layout')

@section('content')
    collections
    <form action="/admin/collections/" method="GET">
      @csrf

      <select name="month" id="">
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">Novermber</option>
        <option value="12">December</option>
      </select>
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