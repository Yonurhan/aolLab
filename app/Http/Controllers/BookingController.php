<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin) {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::where('user', Auth::user()->name)->get();
        }
        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'outlet' => 'required|exists:outlets, name',
            'time' => 'required|date|after:now',
            'guests' => 'required|integer|min:1'
        ]);

        Booking::created([
            'outlet' => $request->outlet,
            'time' => $request->time,
            'guests' => $request->guests,
            'user' => Auth::user()->name
        ]);


        return redirect('/bookings')->with('success', 'Booking created successfully!');
    }
}
