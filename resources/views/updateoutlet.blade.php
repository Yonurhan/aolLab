@extends('layouts.app')

@section('content')

<div class = "container mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
    @endif

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
