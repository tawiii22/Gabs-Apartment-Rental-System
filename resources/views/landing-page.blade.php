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
      font-size: 12px
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
      transform: scale(1.05);
      border-color: #ffc107;
      
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
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      Gab's Apartment
    </a>
    <a class="navbar-brand" href="/rooms/all">
      View rooms</a>
    <a class="navbar-brand" href="/about">
      About us</a>
      <a class="navbar-brand" href="/login">
        Login</a>
    
  </div>
</nav>
<img src="{{asset('images/room1.jpg')}}" alt="" class="img-fluid" width="100%" height="100%">
<!-- @include('components._footer') -->

@endsection
