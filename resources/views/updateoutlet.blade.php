@extends('layouts.app')

@section('content')


<div class = "container mt-4">
    <h3 class = "mb-10"> Update Outlet </h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="row g-3" action ="{{ route('outlets.update', $viewOutlet->id) }}" method = POST>
        @csrf
        @method('PUT')
        <div class="col-12">
          <label for="outlet_name" class="form-label">Outlet Name</label>
          <input type="text" class="form-control" id="outlet_name" name="outlet_name" value="{{ $viewOutlet->outlet_name }}">
        </div>
        <div class="col-12">
          <label for="region" class="form-label">City</label>
          <input type="text" class="form-control" id="region" name="region" value="{{ $viewOutlet->region }}">
        </div>
        <div class="col-12">
          <label for="opening_time" class="form-label">Opening Time</label>
          <input type="time" class="form-control" id="opening_time" name="opening_time" value="{{ $viewOutlet->opening_time }}">
        </div>
        <div class="col-md-12">
        <label for="closing_time" class="form-label">Closing Time</label>
        <input type="time" class="form-control" id="closing_time" name="closing_time" value="{{ $viewOutlet->closing_time }}">
        </div>
        <div class="col-12  mt-3 ">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
</div>

@endsection
