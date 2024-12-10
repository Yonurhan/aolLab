@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1>Bookings</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Outlet</th>
                    <th>Time</th>
                    <th>Guests</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->outlet->outlet_name }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->guests }} people</td>
                        <td>{{ $booking->user }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(!Auth::user()->is_admin)
            <h2 class="mt-5">Create Booking</h2>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-container bg-dark p-3 rounded" style="max-width: 400px; color: white;">
                <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf
                    <div class="form-group" style="margin: 25px 25px">
                        <label for="outlet">Outlet Choice</label>
                        <select id="outlet" name="outlet_id" class="form-control @error('outlet') is-invalid @enderror" required>
                            <option value=""></option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                            @endforeach
                        </select>
                        @error('outlet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3" style="margin: 25px 25px">
                        <label for="time">Time:</label>
                        <input type="datetime-local" id="time" name="time" class="form-control @error('time') is-invalid @enderror" required>
                        @error('time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3" style="margin: 25px 25px">
                        <label for="guests">Number of Guests:</label>
                        <input type="number" id="guests" name="guests" class="form-control @error('guests') is-invalid @enderror" required>
                        @error('guests')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-danger mt-3" style="margin:25px 25px">Submit</button>
                </form>
            </div>
        @endif
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
        .alert-success {
            max-width: 400px;
        }
        .alert-danger {
            max-width: 400px;
        }
    </style>

@endsection
