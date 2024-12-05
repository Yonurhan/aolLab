@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="mt-5">
        <h1>Our Outlets</h1>
        <br>
        <form action="/outlets" method="POST">
            @csrf 
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search by address or city" aria-label="Search" name="search" style="width: 820px;">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        

        <div class="d-flex flex-column">
        @foreach($viewOutlet as $outlet)
            <div class="card mb-4" style="width: 80rem; height: 200px">
                <div class="card-body">
                    <h1 class="card-title font-weight-bold">{{ $outlet->outlet_name }}</h1>
                    <p class="card-text">{{ $outlet->region }}</p>
                    <p class="card-text">Opening Time : {{ $outlet->opening_time }}</p>
                    <p class="card-text">Closing Time : {{ $outlet->closing_time }}</p>
                </div>
            </div>
        @endforeach
        </div>
        
    </div>
    <br>
    {{ $viewOutlet->links() }}
    </div>
</div>
@endsection
