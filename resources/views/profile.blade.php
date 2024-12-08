@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Profile</h1>
            <div class="card">
                <div class="card-header">
                    Profile Details
                </div>
                <div class="card-body">
                    <div class="row g-0">
                        <div class="col-5 col-sm-4">
                            <img src="{{ asset('storage/profile-icon.jpg') }}" class="img-fluid w-100" alt="card-horizontal-image">
                        </div>
                        <div class="col-7 col-sm-8">
                            <div class="card-body">
                                <h5 class="mb-3"><strong>Name:</strong> {{ $user->name }}</h5>
                                <h5 class="mb-3"><strong>Email:</strong> {{ $user->email }}</h5>
                                <h5 class="mb-3"><strong>Phone Number:</strong> {{ $user->phone }}</h5>
                                <h5 class="mb-3"><strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
