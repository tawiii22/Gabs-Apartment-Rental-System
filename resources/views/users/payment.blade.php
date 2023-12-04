@extends('master')
@section('title', 'Confirm Payment')
@section('content')
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="container my-3">
                    <form action="/reservation/confirm" method="POST">
                      @csrf
                        <h5>Personal Information</h5>

                        <label for="name">Full Name</label>
                        <input type="text" id="name" placeholder="Full name" value="{{ old('fullname') }}" name="fullname" class="form-control my-2">
                        @error('fullname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control my-2" placeholder="Email address">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="">Contact Number</label>
                        <input type="number" id="contact_no" name="contact_no" value="{{ old('contact_no') }}" class="form-control my-2" placeholder="Contact Number">
                        @error('contact_no')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="">Gender</label>
                        <div class="form-check">
                        <input value="Male" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" checked>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault1">
                             Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" value="Female" type="radio" name="gender" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                      </div>
                        @for ($i = 0; $i < count($listing->beds); $i++)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="bed_number" type="radio" id="inlineCheckbox1" value="{{$i+1}}">
                                <input class="form-check-input" type="hidden" name="bed_id" id="inlineCheckbox1" value="{{$listing->beds[$i]->id}}">
                                <label class="form-check-label" for="inlineCheckbox1">Bed {{$i+1}} 
                                    <button class="btn {{ $listing->beds[$i]->status ? "btn-success" : "btn-danger" }}">{{ $listing->beds[$i]->status ? "Available" : "Not available" }}</button>
                                </label>
                            </div>
                        @endfor 
                        @error('bed')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="hidden" name="payment_process" value="walk in">
                        <input type="hidden" name="room_id" value="{{ $listing->id }}">
                        <input type="hidden" name="status" id="status" value="pending">
                        <br>
                        <button class="btn btn-primary" id="confirmBtn">Book</button>
                        <!-- <div class="paypal-button-container mt-3" id="paypal-button-container"></div> -->
                    </form>
                </div>
            </div>
            <div class="col-lg-5 shadow mt-5 bg-white" style="border-radius: 15px" id="paymentDetailDiv">

                <div class="row m-3">
                    <div class="col-lg-12 text-center">
                        <img src="{{ asset('images/room.jpg') }}" id="room_image" class="rounded img-fluid mx-auto d-block m-2" style="max-width: 150px; max-height: 150px;">
                        <label><h4>  {{ $listing->room_name }}  </h4></label>
                        <p><h6>  {{ $listing->room_details }}  </h6></p>
                        room type {{ $listing->room_gender }}
                        
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3 text-center"><br>
                    <hr>
                        <h5>Price Details</h5>
                        <div class="row text-end"><h6 class="">  ₱{{ $listing->room_price }} monthly  </h6></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script src="https://www.paypal.com/sdk/js?client-id=ARvqGCp7R4gLQgzgpGElbfWh8OGfx6WfpQSYmVFUeegiEVrRkFbquSHDo9Am6agbABFhvU-8_d-2f2D4"></script>
<script>
  // function confirmReservation(res_status) {
  //     const date = new Date();
  //     const year = date.getFullYear();
  //     const month = date.getMonth();
  //     const day = date.getDate();
  //     const formattedDate = year + '-' + month + '-' + day;
  //     $.ajax({
  //         type: 'POST',
  //         url: '/payment/confirm',
  //         data: {
  //             room_id: $('#room_id').val(),
  //             user_id: $('#user_id').val(),
  //             firstname: $('#firstname').val(),
  //             middlename: $('#middlename').val(),
  //             lastname: $('#lastname').val(),
  //             address: $('#address').val(),
  //             contact_no: $('#contact_no').val(),
  //             room_price: $('#room_price').val(),
  //             status: res_status,
  //             date: formattedDate,
  //             payment_process: $('#payment_process').val()
  //         }, 
  //         success: (data) => {
  //             console.log(data)
  //         },
  //         error: (xhr, ajaxOptions, thrownError) => {console.log(thrownError);}
  //     })
  // }

paypal.Buttons({
  style: {
    color:'blue',
    shape:'pill',
    layout: 'horizontal',
    tagline: 'false',
    height: 40
  },
  createOrder: function(data, actions) {
    if(checkForm2()){
      return actions.order.create({
      purchase_units: [{
        amount: {
          value: '0.01'
        }
      }]
    });
    }
    else {
      alert("Fill in missing fields")
    }
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
      $('#status').val('approved')
      $('#confirm_payment_form').submit()
      alert('Transaction completed by ' + details.payer.name.given_name + '!');
      // window.location.href = 'reservation.php'
    });
  },
  onCancel: function(data) {
    $('#status').val('pending')
    $('#confirm_payment_form').submit()
    // window.location.href = 'reservation.php'
  }
}).render('#paypal-button-container');

$('#confirmBtn').onClick(()=>{
  $('#status').val('pending')
  $('#confirm_payment_form').submit()
      alert('Transaction completed by ' + details.payer.name.given_name + '!');
})

</script>
<script>
     const checkForm2 = ()  => {
            var name = document.getElementById('name').value
            var address = document.getElementById('address').value
            var contact_no = document.getElementById('contact_no').value
            var email = document.getElementById('email').value
            return  name != '' && email != '' && address != '' && contact_no != '' ? true : false
        }
</script>

@endsection
