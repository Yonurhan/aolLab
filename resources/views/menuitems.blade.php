@extends('layouts.app')

@section('content')
<div class="flex flex-column justify-content-center align-items-center ms-5 me-5">
    <div class="mt-5 text-center">
        <h1>Menu items</h1>
        <br>
        <form action="/menu-items" method="POST">
            @csrf 
            <nav class="navbar navbar-light bg-light">
                <div class="d-flex w-100">
                    <input 
                        class="form-control flex-grow-1 me-2" 
                        type="search" 
                        placeholder="Search the menu.." 
                        aria-label="Search" 
                        name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </nav>

        <div class="row">
        @foreach($viewMakanan as $makanan)
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="card text-center" style="width: 18rem; height: 450px">
                    <img src="{{ asset('storage/' . $makanan->image_path) }}" alt="{{ $makanan->food_name }}" class="card-img-top"  style="height: 300px; width: 100%; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $makanan->food_name }}</h5>
                        <p class="card-text">{{ $makanan->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <br>
        {{ $viewMakanan->links() }}
    </div>
</div>
@endsection
