<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bookings</h1>
        <table>
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
                        <td>{{ $booking->outlet }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->guests }}</td>
                        <td>{{ $booking->user }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(!Auth::user()->is_admin)
            <h2>Create Booking</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="/bookings" method="POST">
                @csrf
                <div>
                    <label for="outlet">Outlet:</label>
                    <input type="text" id="outlet" name="outlet" required>
                </div>
                <div>
                    <label for="time">Time:</label>
                    <input type="datetime-local" id="time" name="time" min="{{ now()->format('Y-m-d\TH:i') }}" required>
                </div>
                <div>
                    <label for="guests">Guests:</label>
                    <input type="number" id="guests" name="guests" min="1" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        @endif
    </div>
</body>
</html>
