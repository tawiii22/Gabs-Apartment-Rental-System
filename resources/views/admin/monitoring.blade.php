@extends('components.admin-layout')

@section('content')
    monitoring
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact #</th>
                <th scope="col">Room name</th>
                <th scope="col">email</th>
                <th scope="col">Date</th>
                <th scope="col">Filter</th>
                <th scope="col">Payment</th>
                <th scope="col">Remarks</th>
            </tr>
            
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->fullname }}</td>
                <td>{{ $reservation->contact_no }}</td>
                <td>{{ $reservation->room->room_name }}</td>
                <td>{{ $reservation->email }}</td>
                <td>
                    {{-- {{ $reservation->created_at }} --}}
                    @foreach ($reservation->booked_date as $date)
                        {{$date->booked_date}} {{$date->status}}
                        <br>
                    @endforeach
                
                </td>
                <td>
                    <form action="/reservation/add-date/{{ $reservation->id }}" method="POST">
                        @csrf
                        <input type="date" name="date">
                        <input type="number" name="payment">
                        <select name="remarks" id="cars">
                            <option value="paid">Paid</option>
                            <option value="advance">Advance</option>
                            <option value="partial">Partial</option>
                        </select>
                        <button class="btn btn-sm btn-success" type="submit">
                            Paid
                        </button>
                    </form>
                </td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->email }}</td>

                
                {{-- <td>{{ $reservation->created_at->format('F d, Y') }}
                    <br>
                    {{ $reservation->created_at->format('F d, Y') }}
                </td> --}}
                {{-- <td>
                    <button class="btn btn-success">
                        Paid
                    </button><i class="bi bi-plus-lg"></i>
                    <button class="btn btn-danger">
                        Unpaid
                    </button>
                </td> --}}
            </tr>
            @endforeach
            
          </tbody>
      </table>
@endsection