@extends('components.admin-layout')

@section('content')

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-dark text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Room name</th>
                        <th scope="col">Bed no.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->fullname }}</td>
                        <td>{{ $reservation->contact_no }}</td>
                        <td>{{ $reservation->room->room_name }}</td>
                        <td>{{ $reservation->bed_number }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($reservation->booked_date as $date)
                                <li>{{ $date->booked_date }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($reservation->booked_date as $date)
                                <li>{{ $date->remarks }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($reservation->booked_date as $date)
                                <li>{{ $date->payment }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <button type="button" class="btn  btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$reservation->id}}">
                                See info
                            </button>
                            <div class="modal fade" id="exampleModal{{$reservation->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/reservation/add-date/{{ $reservation->id }}" method="POST">
                                                @csrf
                                                <input type="date" name="date" class="form-control mb-2">
                                                @error('date')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <input type="number" name="payment" class="form-control mb-2">
                                                @error('payment')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <select name="remarks" class="form-select mb-2">
                                                    <option value="paid">Paid</option>
                                                    <option value="advance">Advance</option>
                                                    <option value="partial">Partial</option>
                                                </select>
                                                @error('remarks')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                <button class="btn btn-sm btn-success" type="submit">Paid</button>
                                            </form>
                                            <table class="table table-bordered border-dark mt-3">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Remarks</th>
                                                        <th scope="col">Payment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reservation->booked_date as $date)
                                                    <tr>
                                                        <td>{{ $date->booked_date }}</td>
                                                        <td>{{ $date->remarks }}</td>
                                                        <td>{{ $date->payment }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
