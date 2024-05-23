@extends('components.admin-layout')

@section('content')

<body style="background-color:  rgb(236, 236, 236)">
    <div class="container">
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered border-dark text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Bed no.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact #</th>
                        <th scope="col">Room name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->bed_number }}</td>
                        <td>{{ $reservation->fullname }}</td>
                        <td>{{ $reservation->contact_no }}</td>
                        <td>{{ $reservation->room->room_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->room->room_gender }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>
                            <form method="POST" action="/admin/approve-reservation/{{ $reservation->id }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm mx-2 mb-1">
                                    Approve
                                </button>
                            </form>
                            <form method="POST" action="/admin/cancel-reservation/{{ $reservation->id }}">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm mx-2">
                                    Cancel
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
