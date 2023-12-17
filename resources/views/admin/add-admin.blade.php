@extends('components.admin-layout')

@section('content')
    add admin
    <div class="card p-4" style="width: 80%">
        <form action="/admin/create-admin" method="POST">
            @csrf
            <p class="text-center">Create admin account</p>
            <input type="text" placeholder="Email" name="email" class="mb-2 form-control">
            @error('email')
                <p class="text-red">{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Password" name="password" class="form-control">
            @error('password')
                <p class="text-red">{{ $message }}</p>
            @enderror
            <button class="btn btn-success mt-3">Create</button>
        </form>
    </div>
@endsection