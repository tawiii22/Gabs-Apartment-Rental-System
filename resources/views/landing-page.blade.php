@extends('master')
@section('title', 'Home')
@section('content')

<style>
  /* Hero Section Styling */
  .container-fluid {
    padding: 0;
  }

  .hero-section {
    position: relative;
  }

  .hero-section img {
    width: 100%;
    height: auto;
  }

  .hero-content {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    font-weight: 600;
  }

  .hero-content h1 {
    font-size: 50px;
    margin-bottom: 20px;
  }

  .hero-content p {
    font-size: 18px;
    margin-bottom: 30px;
  }

  .hero-content .btn {
    font-size: 18px;
    padding: 5px 15px;
  }
</style>

<nav class="navbar navbar-expand-lg" style="background: rgba(0,0,0,0.1);">
  <div class="container">
    <a class="navbar-brand" href="#">
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

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div style="position: relative;">
        <img src="{{asset('images/room1.jpg')}}" alt="" class="img-fluid" width="100%" height="100%">
        <div class="hero-content">
          <h1>Welcome to Gab's Apartment</h1>
          <p>Experience luxury and comfort like never before!</p>
          <a href="/rooms/all" class="btn btn-secondary">Explore Our Rooms</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
