@extends('master')
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
      
    <div>
        <div class="col-lg-11 mx-auto " style="margin-top:50px; background-color: rgb(162, 202, 229);">
            <div class="text-white  shadow-sm rounded banner bg-dark text-center p-4">
                <h1 class="display-4">Gab's Aparment System</h1>
                <p class="lead"> </p>
            </div>
            <br><h2 class="p-3 text-center"><b>Gab's Apartment System is a modern, innovative residential complex designed to cater to the diverse needs of urban dwellers. This system integrates state of the art amenities, sustainable living practices,
                 and community-centric spaces to create a harmonious living environment</b></h2>
            <br>
            <br>
            <br>
            <div style="margin-bottom: 50px;  ">
                <a class="p-3 fw-bold" href="http://127.0.0.1:8000/" style="color: black;">Home</a>
                <i class="fas fa-phone p-3" style="margin-left: 10px;">09764582736</i>
                <a class="p-3 fw-bold" href="https://www.facebook.com/" style="color: black;"><i class="bi bi-facebook"></i></a>
            </div>
</body>

@endsection