@extends('layouts.app')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="card" style="width: 80rem">
        <div class="card-body" style="background-image: url('{{ asset('storage/storage/Discovery_background.jpg') }}'); background-size: cover; background-position: center; color:white">
            <h1 class="card-title text-center">Discover CuantiN</h1>
            <p class="card-text text-center">The modern, authentic Chinese Restaurant, CuantiN started their culinary story back in 1915</p>
            <div class="text-center">
                <a href="/menu-items" class="btn btn-danger text-white">Explore Our Menu</a>
            </div>
        </div>
    </div>


    <div class="mt-5 text-center">
        <h1>About Us</h1>
        <p>Our restaurant offers the inest dining experience with a variety of delicious dishes cafted by our expert chefs, 
            Come and enjoy a meal in our cozy and welcoming atmosphere </p>
    </div>

    <div class="mt-5 text-center">
        <h1>Menu Highlights</h1>
        <br>
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
