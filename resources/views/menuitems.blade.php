@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="mt-5 text-center">
        <h1>Menu items</h1>
        <br>
        <form action="/menu-items" method="POST">
            @csrf 
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search the menu.." aria-label="Search" name="search" style="width: 820px;">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>

        
        <div class="row">
        @foreach($viewMakanan as $makanan)
            <div class="col-md-4">

                <div class="card text-center" style="width: 18rem; height: 450px">
                        <img src="{{ asset('storage/' . $makanan->image_path) }}" alt="{{ $makanan->food_name }}" class="card-img-top"  style="height: 300px; width: 100%; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $makanan->food_name }}</h5>
                            <p class="card-text">{{ $makanan->description }}</p>
                        </div>
                    </div>
            </form>
            </div>
        @endforeach
    </div>
    <br>
    {{ $viewMakanan->links() }}
    </div>
</div>
@endsection
