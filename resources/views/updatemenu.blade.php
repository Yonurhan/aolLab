@extends('layouts.app')

@section('content')


<div class = "container mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
    @endif

    <h3 class = "mb-10"> Update Menu </h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="row g-3" action ="{{ route('menus.update', $viewMenu->id) }}" method = POST enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="item_type" class="form-label">Item Type</label>
            <select class="form-control" name="item_type" id="item_type">
                <option value="" {{ $viewMenu->item_type == '' ? 'selected' : '' }}></option>
                <option value="Dimsum" {{ $viewMenu->item_type == 'Dimsum' ? 'selected' : '' }}>Dimsum</option>
                <option value="Ala Carte" {{ $viewMenu->item_type == 'Ala Carte' ? 'selected' : '' }}>Ala Carte</option>
                <option value="Drink" {{ $viewMenu->item_type == 'Drink' ? 'selected' : '' }}>Drink</option>
                <option value="Dessert" {{ $viewMenu->item_type == 'Dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>
        <div class="col-md-12 mt-2">
            <label for="food_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Enter Food Name" value="{{ $viewMenu->food_name }}">
        </div>
        <div class="col-md-12 mt-2">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="{{ $viewMenu->description }}">
        </div>
        <div class="col-md-12 mt-2">
            <input type="file" class="form-control-file" id="file" name="file">
            <img src="{{ asset('storage/' . $viewMenu->image_path) }}" alt="{{ $viewMenu->food_name }}" style="height: 200px; width: 200px; object-fit: cover;">
            @error('file')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.classList.add('fade-out');
                setTimeout(function() {
                    successAlert.remove();
                }, 1000);
            }
        }, 5000);
    });
</script>

<style>
    .fixed-top {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        margin: 0;
    }
    .fade-out {
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>

@endsection
