@extends('components.admin-layout')

@section('content')
    pending
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">Bed no.</th>
              <th scope="col">Name</th>
              <th scope="col">Contact #</th>
              <th scope="col">Room type</th>
              <th scope="col">Email</th>
              <th scope="col">Gender</th>
              <th scope="col">Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <th scope="row">{{ $reservation->bed_number }}</th>
                <td>{{ $reservation->fullname }}</td>
                <td>{{ $reservation->contact_no }}</td>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->email }}</td>
                <td>{{ $reservation->gender }}</td>
                <td>{{ $reservation->created_at }}</td>
                <td>
                    <form method="POST" action="/admin/approve-reservation/{{ $reservation->id }}">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Approve
                        </button>
                    </form>
                    <form method="POST" action="/admin/cancel-reservation/{{ $reservation->id }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Cancel
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
      </table>
@endsection