@extends('layouts.app')

@section('content')

<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-sm-6 col-md-8">
        <h3 class="mb-4">Outlets</h3>
            <table class="table table-bordered">
                <tbody>
                    @foreach($viewOutlet as $index => $outlet)
                        <tr>
                            <th scope="row">{{ (int)$index + 1 }}</th>
                            <td class="col-sm-6 col-md-8">{{ $outlet->outlet_name }}</td>
                            <td class="col-6 col-md-4"><a href="{{ route('outlet.edit', $outlet->id) }}" class="btn btn-danger">Edit</a> Created at: {{ $outlet->date }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-6 col-md-4">
            <h3>Add Outlet</h3>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                <form class="row g-3" action="/add-outlet" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <label for="outlet_name" class="form-label">Address</label>
                        <input type="text" class="form-control" id="outlet_name" name="outlet_name" placeholder="Enter Address">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="region" class="form-label">City</label>
                        <input type="text" class="form-control" id="region" name="region" placeholder="Enter City">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="opening_time" class="form-label">Opening Time</label>
                        <input type="time" class="form-control" id="opening_time" name="opening_time">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="closing_time" class="form-label">Closing Time</label>
                        <input type="time" class="form-control" id="closing_time" name="closing_time">
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-danger">Add Outlet</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>

@endsection
