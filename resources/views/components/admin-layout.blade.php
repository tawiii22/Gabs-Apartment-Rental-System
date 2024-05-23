<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Questrial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 5px 20px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block;
        }

        .sidebar a:hover {
            background-color: #abbcce;
        }

        .active {
            background-color: rgb(233, 233, 233);
            color: black;
        }

        .content {
            margin-left: 200px;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo img {
            max-width: 50px;
        }
    </style>
</head>

<body>

    @auth
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo">
        </div>
        <hr>
        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="/admin/rooms" class="{{ request()->is('admin/rooms') ? 'active' : '' }}">Rooms</a>
        <a href="/admin/pending" class="{{ request()->is('admin/pending') ? 'active' : '' }}">Pending</a>
        <a href="/admin/transactions" class="{{ request()->is('admin/transactions') ? 'active' : '' }}">Transaction</a>
        <a href="/admin/view-cancel" class="{{ request()->is('admin/view-cancel') ? 'active' : '' }}">View cancel</a>
        <a href="/admin/history" class="{{ request()->is('admin/history') ? 'active' : '' }}">History</a>
        <a href="/admin/monitoring" class="{{ request()->is('admin/monitoring') ? 'active' : '' }}">Monitoring</a>
        <a href="/admin/collections" class="{{ request()->is('admin/collections') ? 'active' : '' }}">Collections</a>
        <a href="/admin/create-admin" class="{{ request()->is('admin/create-admin') ? 'active' : '' }}">Create admin</a>
        <hr>
        <form action="/logout" method="GET" class="mx-3">
            <button class="btn btn-sm btn-dark">Logout</button>
        </form>
    </div>
    @endauth

    <div class="content">
        @yield('content')
    </div>

</body>

</html>
