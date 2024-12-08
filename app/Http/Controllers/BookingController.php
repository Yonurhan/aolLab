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
            // $bookings = Booking::all();
            $bookings = Booking::with('user', 'outlet')->get();
        } else {
            // $bookings = Booking::where('id', Auth::user()->id)->get();
            $bookings = Booking::with('user', 'outlet')->where('id', Auth::user()->id)->get();
        }
        return view('bookings', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'outlet' => 'required|exists:outlets, name',
            'time' => 'required|date|after:now',
            'guests' => 'required|integer|min:1'
        ]);

        Booking::create([
            'id' => Auth::id(),
            'outlet' => $request->outlet,
            'time' => $request->time,
            'guests' => $request->guests,
            'user' => Auth::user()->name
        ]);


        return redirect('/bookings')->with('success', 'Booking created successfully!');
    }
}
