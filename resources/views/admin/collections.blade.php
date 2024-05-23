@extends('components.admin-layout')

@section('content')

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <br><br>
        <form action="/admin/collections/" method="GET" class="mb-3">
            @csrf
            <div class="row align-items-center">
                <div class="col-md-3">
                    <label for="start" class="form-label">Start Date:</label>
                    <input type="date" name="start" id="start" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="end" class="form-label">End Date:</label>
                    <input type="date" name="end" id="end" class="form-control">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Go</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered border-dark">
            <thead class="table-dark">
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
                    <td class="text-end" colspan="2"><strong>Total</strong></td>
                    <td><strong>{{ $total }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
@endsection
