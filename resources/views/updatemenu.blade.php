@extends('layouts.app')

@section('content')


<div class = "container mt-4">
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
            <input type="text" class="form-control" id="item_type" name="item_type" placeholder="Enter Item Type" value="{{ $viewMenu->item_type }}">
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
            <button type="submit" class="btn btn-danger">Save Changes</button>
        </div>
      </form>
</div>

@endsection
