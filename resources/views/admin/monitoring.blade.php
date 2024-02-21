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
                <th scope="col">Actions</th>
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
                        
                        <ul class="list-group">
                            @for($i = 1; $i <= count($reservation->booked_date); $i++) 
                                <li class="list-group-item"> ({{$i}}) {{$reservation->booked_date[$i-1]->booked_date}} </li>
                            @endfor
                          </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            @for($i = 1; $i <= count($reservation->booked_date); $i++) 
                                <li class="list-group-item"> ({{$i}}) {{$reservation->booked_date[$i-1]->remarks}} </li>
                            @endfor
                          </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            @for($i = 1; $i <= count($reservation->booked_date); $i++) 
                                <li class="list-group-item"> ({{$i}}) {{$reservation->booked_date[$i-1]->payment}} </li>
                            @endfor
                          </ul>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$reservation->id}}">
                            see info
                          </button>
                          <div class="modal fade" id="exampleModal{{$reservation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
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
                                    <table class="table table-bordered border-primary">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Remarks</th>
                                                <th scope="col">Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservation->booked_date as $date)
                                                <tr>
                                                    <td> {{$date->booked_date}} </td>
                                                    <td> {{$date->remarks}} </td>
                                                    <td> {{$date->payment}} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
      </table>
     
@endsection

<script>

    // function updateModal(reservation) {
    //     console.log(reservation)
    //     document.getElementById('name').innerHTML = reservation.fullname
    //     document.getElementById('email').innerHTML = reservation.email

    // }

</script>