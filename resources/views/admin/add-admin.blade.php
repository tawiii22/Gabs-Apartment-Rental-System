@extends('components.admin-layout')

@section('content')

<body style="background-color: rgb(236, 236, 236)">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card p-4">
                    <form action="/admin/create-admin" method="POST">
                        @csrf
                        <h4 class="text-center mb-4">Create Admin Account</h4>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
@endsection
