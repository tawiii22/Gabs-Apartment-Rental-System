@extends('master')
@section('title', $listing->room_name )

@section('content')
<style>

    .img-fluid:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    .rounded-left {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .rounded-bottom-right {
        border-bottom-right-radius: 15px;
    }

    .rounded-top-right {
        border-top-right-radius: 15px;
    }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .top-right-button {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
    }

    .top-button {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }

    .offcanvas-container {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.7);
        transition: height 0.3s ease-in-out;
    }

    .offcanvas-container.show {
        height: 100%;
    }

    .offcanvas-content {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        transform: translateY(100%);
        animation: slideFromBottom 0.3s ease-in-out forwards;
    }

    @keyframes slideFromBottom {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(0);
        }
    }

    .overlay {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: none;
    }

    .fullscreen-img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
    }

    .btn-transparent {
        opacity: 0.8;
    }

    /* Style the close button */
    .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }
    #save_icon:hover {
        text-decoration: underline;
        cursor: pointer;
    }
    #unsave_icon:hover {
        text-decoration: underline;
        cursor: pointer;
    }
    #rating-container {
        background-color: rgba(0, 0, 0, 0.8); 
        color: white; 
        position: absolute; 
        width: 170px; 
        margin-left: 50px;
        visibility: hidden;
    }
    
    .rating-hover:hover + #rating-container{
        visibility: visible;
        font-size: 15px
    }
</style>

<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-12">
        <h1 id="house_title">{{$listing->room_name}}  </h1>  
        </div>
        
        @php 
            $room_image = explode(',', $listing->room_image);
        @endphp
    </div>
    <div class="row mb-2">
        
        <div class="col-8 text-start">
            <i class="fa-solid fa-location-dot" style="color: red;"></i> Located in - <span style="text-decoration: underline;"> {{ $listing->room_location }} </span> 
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-8 text-start">
            heloo
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="{{ asset('images/'.$room_image[0]) }}" id="img0" onclick="openFullscreen(this)"
                class="img-fluid w-100 rounded-left ms-4" style="height: 360px;">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/'.$room_image[1]) }}" id="" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-cover ms-2 w-100" style="height: 175px; margin-bottom: 5px;">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/'.$room_image[2]) }}" id="" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-cover ms-2" style="height: 175px; margin-top: 5px;">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="row">
                <div class="col-12 image-container">
                    <img src="{{asset('images/'.$room_image[3])}}" id="img3" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-cover rounded-top-right w-100"
                        style="height: 175px; margin-bottom: 5px;">
                    <button class="btn btn-light me-4 mt-2 btn-sm top-right-button btn-transparent" id="showAllButton"
                        data-bs-toggle="offcanvas" data-bs-target="#imageOffcanvas"><i class="bi bi-layers"></i> Show
                        all
                        images</button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/'.$room_image[4]) }}" id="" onclick="openFullscreen(this)"
                        class="img-fluid object-fit-fill rounded-bottom-right w-100"
                        style="height: 175px; margin-top: 5px;">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="h4 text-dark">About this place</div>
            <ul>
                <li>
                    <div class="h5 mx-5 text-dark" id="house_desc"> {{ $listing->room_details }} </div>
                </li>
                <li>
                    <div class="h5 mx-5 text-dark" id="house_location"> Located in {{ $listing->room_location }} </div>
                </li>
               
                @for ($i = 0; $i < count($listing->beds); $i++)
                <li>
                    <div class="h5 mx-5 text-dark" id="house_location"> Bed {{$i+1}}
                        <button class="btn {{ $listing->beds[$i]->status ? "btn-success" : "btn-danger" }}">{{ $listing->beds[$i]->status ? "Available" : "Not available" }}</button>    
                    </div>
                </li>
                @endfor
                
            </ul>
            <hr>
        <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
            <div class="card">
                <form method="get" action="/payment/{{ $listing->id }}">
                    @csrf
                <div class="card-body">
                    <h3 class="card-title">Price details</h3>
                    <p class="card-text">Monthly Fee <label for="" style="margin-left: 135px;"
                            id="house_price">₱{{ $listing->room_price }}</label></p>
                            <button type="submit" class="btn btn-success form-control" id="reserveBtn">Reserve Now</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_guest_house_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Guest House</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form method="POST" action="/rooms/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button type="button submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
<div class="offcanvas offcanvas-container" tabindex="-1" id="imageOffcanvas" aria-labelledby="imageOffcanvasLabel">
    <div class="offcanvas-content">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="imageOffcanvasLabel">All Images</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="imageGallery" class="row">
                    @for($i = 0; $i < count($room_image); $i++)
                    <img src="{{ asset('images/'.$room_image[$i]) }}" id="" onclick="openFullscreen(this)"
                    class="img-fluid object-fit-fill rounded-bottom-right w-25"
                            style="height: 175px; margin-top: 5px;">
                    @endfor
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="rate_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="/rooms/rate/{{ $listing->id }}" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this guest house</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                @csrf
                <div class="container justify-content-center d-flex h2">
                    <span class="fa fa-star" id="modal_star0"></span>
                    <span class="fa fa-star" id="modal_star1"></span>
                    <span class="fa fa-star" id="modal_star2"></span>
                    <span class="fa fa-star" id="modal_star3"></span>
                    <span class="fa fa-star" id="modal_star4"></span>
                </div>
                <input type="hidden" name="rating" id="rating">
                @error('rating')
                    <p class="text-danger"> {{ $message}} </p>
                @enderror
                <textarea name="review" id="" cols="30" rows="2" class="form-control" placeholder="Write a review.."></textarea>
                </div>
        <div class="modal-footer">
            <button type="button submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
    </div>
  </div> -->

<script>
    function openFullscreen(img) {
        var overlay = document.createElement("div");
        overlay.classList.add("overlay");

        var fullscreenImg = document.createElement("img");
        fullscreenImg.classList.add("fullscreen-img");
        fullscreenImg.src = img.src;

        var closeBtn = document.createElement("span");
        closeBtn.classList.add("close-btn");
        closeBtn.innerHTML = "&times;";
        closeBtn.onclick = closeFullscreen;

        overlay.appendChild(fullscreenImg);
        overlay.appendChild(closeBtn);

        document.body.appendChild(overlay);

        overlay.style.display = "block";
    }

    function closeFullscreen() {
        var overlay = document.querySelector(".overlay");
        overlay.style.display = "none";

        overlay.removeChild(overlay.querySelector(".fullscreen-img"));
        overlay.removeChild(overlay.querySelector(".close-btn"));

        document.body.removeChild(overlay);
    }

@if(auth()->user())
    $('#save_icon').on('click', function() {
        
        $.ajax({
            url: '/wishlist/save',
            type: 'POST',
            data: {
                user_id: "{{ auth()->user()->id }}",
                room_id: "{{ $listing->id }}",
                _token: " {{ csrf_token() }} "
            },
            success: function(data) {
                console.log(data);
                $('#save_icon').html('<i class="bi bi-heart-fill text-danger"></i> saved');
                $('#save_icon').attr('id', 'unsave_icon');
            },
            error: function(error) {
                console.log(error)
            }
        })

    })
@if(isset($wishlist))
    $('#unsave_icon').on('click', function() {
        
        $.ajax({
            url: '/wishlist/unsave',
            type: 'DELETE',
            data: {
                id: "{{ $wishlist->id }}",
                _token: " {{ csrf_token() }} "
            },
            success: function(data) {
                console.log(data);
                $('#unsave_icon').html('<i class="bi bi-heart"></i> save');
                $('#unsave_icon').attr('id', 'save_icon');
            },
            error: function(error) {
                console.log(error)
            }
        })

    })
@endif
@endif

$(document).ready(function() {
  var canInteract = true; // Flag to indicate if stars can be interacted with
  
  // When a star is hovered
  $(".fa-star").hover(function() {
    if (canInteract) {
      // Get the index of the hovered star
      var starIndex = $(this).index();
      // Color the star and all stars before it
      for (var i = 0; i <= starIndex; i++) {
        $('#star' + i).css('color', 'rgb(255, 190, 11)');
        $('#modal_star' + i).css('color', 'rgb(255, 190, 11)');
      }
    }
  }, function() {
    if (canInteract) {
      // Change the color of all stars back to the original color
      for (var i = 0; i < 5; i++) {
        $('#star' + i).css('color', 'black');
        $('#modal_star' + i).css('color', 'black');
      }
    }
  });
  
  // When a star is clicked
  $(".fa-star").click(function() {
    if (canInteract) {
      canInteract = false; // Disable further interaction with the stars
      // Get the index of the clicked star
      var starIndex = $(this).index();
      $('#rating').val(starIndex)
      // Color the star and all stars before it
      for (var i = 0; i <= starIndex; i++) {
        $('#star' + i).css('color', 'rgb(255, 190, 11)');
        $('#modal_star' + i).css('color', 'rgb(255, 190, 11)');
      }
    }
  });
});


</script>
<!-- @include('components._footer') -->

@endsection