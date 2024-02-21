@props(['listing'])
@php


@endphp
<div class="room col-6">
    <a href="/rooms/{{$listing->id}}">
      <div id="carouselExample{{$listing->id}}" class="carousel slide card" data-bs-ride="carousel">
        <div class="carousel-inner">
            
          <x-gh-card-img :cardimg="$listing->room_image" />          

        </div>
        <div class="card-body">
          <div class="room-name row ">
            <div class="col-8">
              <h5 class="truncate-text-title"> {{$listing->room_name}} </h5>
            </div>
            <div class="col-4">
              <i class="fa-solid fa-star" style="color: rgb(255, 190, 11);"></i> {{ $listing->averageRating }}
            </div>
          </div>
            <div class="room-desc"> 
                <p class="truncate-text"> {{ $listing->room_details }} </p> 
             </div>
          <div>
            <p>
              <label class="fw-bold">₱ {{ $listing->room_price }} </label> monthly
            </p>
          </div>
        </div>
        <button class="carousel-control-prev"  style="margin-bottom: 150px; display: block;" type="button" data-bs-target="#carouselExample{{$listing->id}}" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" style="border-radius: 50%" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next rounded"  style="margin-bottom: 150px; display: block;" type="button" data-bs-target="#carouselExample{{$listing->id}}" data-bs-slide="next">
          <span class="carousel-control-next-icon " style="border-radius: 50%" aria-hidden="true"></span>
          <span class="visually-hidden bg-dark">Next</span>
        </button>
      </div>
    </a>
  </div>