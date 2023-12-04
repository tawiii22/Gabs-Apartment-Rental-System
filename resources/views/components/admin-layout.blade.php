
<html>

<head>
  <link rel="icon" href="{{ asset('images/logo/logo.png') }}" style="object-fit: cover;">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Questrial&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title> @yield('title') </title>
  <style>
   
    body {
        font-family: 'Questrial', sans-serif;
    }

    a {
      text-decoration: none;
      color: black;
    }

    .profile_avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    margin-right: 10px;
    object-fit: cover;
  }
    
  </style>
</head>

<body>

  <form action="/logout" method="GET">
    <button class="btn btn-danger">Logout</button>
  </form>

    <div class="row">
        <div class="col-3">
            <div class="list-group mt-5">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action {{ request()->is('admin/dashboard') ? 'active' : '' }}" aria-current="true">
                  Dashboard
                </a>
                <a href="/admin/rooms" class="list-group-item list-group-item-action {{ request()->is('admin/rooms') ? 'active' : '' }} ">Rooms</a>
                <a href="/admin/pending" class="list-group-item list-group-item-action {{ request()->is('admin/pending') ? 'active' : '' }} ">Pending</a>
                <a href="/admin/transactions" class="list-group-item list-group-item-action {{ request()->is('admin/transactions') ? 'active' : '' }} ">Transaction</a>
                <a href="/admin/view-cancel" class="list-group-item list-group-item-action {{ request()->is('admin/view-cancel') ? 'active' : '' }} ">View cancel</a>
                <a href="/admin/history" class="list-group-item list-group-item-action {{ request()->is('admin/history') ? 'active' : '' }} ">History</a>
                <a href="/admin/monitoring" class="list-group-item list-group-item-action {{ request()->is('admin/monitoring') ? 'active' : '' }} ">Monitoring</a>
                <a href="/admin/collections" class="list-group-item list-group-item-action {{ request()->is('admin/collections') ? 'active' : '' }} ">Collections</a>
                <a href="/admin/create-admin" class="list-group-item list-group-item-action {{ request()->is('admin/create-admin') ? 'active' : '' }} ">Create admin</a>
              </div>
        </div>
        <div class="col-9">
              @yield('content')
        </div>
    </div>

  </body>

</html>

