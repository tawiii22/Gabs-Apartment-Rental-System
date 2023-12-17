@extends('components.admin-layout')

@section('content')
    monitoring
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact #</th>
                <th scope="col">Room name</th>
                <th scope="col">Bed no.</th>
                <th scope="col">email</th>
                <th scope="col">Date</th>
                <th scope="col">Remarks</th>
                <th scope="col">Payment</th>
                <th scope="col">Filter</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td scope="row">{{ $reservation->fullname }}</td>
                    <td>{{ $reservation->contact_no }}</td>
                    <td>{{ $reservation->room->room_name }}</td>
                    <td>{{ $reservation->bed_number }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>
                        @foreach ($reservation->booked_date as $date)
                            {{$date->booked_date}} 
                            <br>
                        @endforeach
                    </td>
                    <td>
                    
                        @foreach ($reservation->booked_date as $date)
                            {{ $date->remarks }}
                            <br>
                
                        @endforeach
                    </td>
                    <td>
                        @foreach ($reservation->booked_date as $date)
                            {{ $date->payment }}
                            <br>
                        @endforeach
                    </td>
                    <td>
                        <form action="/reservation/add-date/{{ $reservation->id }}" method="POST">
                            @csrf
                            <input type="date" name="date">
                            @error('date')
                                <p class="text-red">{{ $message }}</p>
                            @enderror
                            <input type="number" name="payment">
                            @error('payment')
                                <p class="text-red">{{ $message }}</p>
                            @enderror
                            <br>
                            <select name="remarks">
                                <option value="paid">Paid</option>
                                <option value="advance">Advance</option>
                                <option value="partial">Partial</option>
                            </select>
                            @error('remarks')
                                <p class="text-red">{{ $message }}</p>
                            @enderror
                            <button class="btn btn-sm btn-success" type="submit">
                                Paid
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
      </table>
@endsection