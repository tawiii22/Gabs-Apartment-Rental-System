@extends('master')
@section('title', 'Home')
@section('content')
<style>
    .truncate-text {
      display: -webkit-box;
      -webkit-line-clamp: 2; /* Adjust the number of lines to show */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }

 

    .card-body span {
      font-size: 12px;
    }

    .truncate-text-title {
      display: -webkit-box;
      -webkit-line-clamp: 1; /* Adjust the number of lines to show */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    
    .container-fluid {
      padding-left: 50px;
      padding-right: 50px
    }

    .card:hover {
      cursor: pointer;
    }

    .card:hover .truncate-text{
      -webkit-line-clamp: unset;
    }

    .card:hover .truncate-text-title{
      -webkit-line-clamp: unset;
    }

    .card:hover {
      transform: scale(1.02);
      border-radius: 10px;
      border-color: black;
      
    }
    
    .card-img-overlay {
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .room:hover .carousel-control-prev .carousel-control-prev-icon,
    .room:hover .carousel-control-next .carousel-control-next-icon {
      background-color: black
    }
    
    .card:hover .card-img-overlay {
      opacity: 1;
    }

    .card i {
      margin-top: 5px;
      font-size: 20px;
    }

    .icon-text {
      font-size: 13px;
    }

    .col .card {
      border: none;
      color: gray;
      box-sizing: border-box;
      height: 57px;
    }

    .col .card:hover {
      color: black;
      border-bottom: 4px solid gray;
    }
    

</style>
<body>
  <nav class="navbar navbar-expand-lg" style="background: rgba(0,0,0,0.1);">
    <div class="container">
      <a class="navbar-brand" href="/">
        Gab's Apartment
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" style="margin-left: 75%; font-size: 18px;">
          <li class="nav-item">
            <a class="nav-link" href="/rooms/all">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid mt-8">

    <div class="btn-group pt-3" role="group" aria-label="Basic example">
        <a href="/rooms/all/for-boys">
            <button type="button" class="btn btn-primary" style="margin-right: 5px"><b>For boys</b></button>
        </a>
        <a href="/rooms/all/for-girls">
            <button type="button" class="btn btn-primary"><b>For girls</b></button>
        </a>
    </div>
    <br>
    <br>

<div class="row" id="roomDiv" name="roomDiv">
      
@foreach ($listings as $listing)

        <x-listing-card :listing="$listing" />
    
@endforeach
</div>
</div>
</body>

<!-- @include('components._footer') -->

@endsection
