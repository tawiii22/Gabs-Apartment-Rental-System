@extends('components.admin-layout')

@section('content')
    inventory
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Room type</th>
              <th scope="col">Date</th>
              <th scope="col">Billing instruction</th>
              <th scope="col">Credits</th>
              <th scope="col">Debits</th>
              <th scope="col">Balance</th>
              <th scope="col">Remarks</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    
                  </tr>
            
          </tbody>
      </table>
@endsection