<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $outlets = Outlet::all();

        if ($user->is_admin) {
            // $bookings = Booking::all();
            $bookings = Booking::with('user', 'outlet')->get();
        } else {
            // $bookings = Booking::where('id', Auth::user()->id)->get();
            $bookings = Booking::with('outlet')->where('user_id', $user->id)->get();
        }
        return view('bookings', compact('bookings', 'outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'outlet_id' => 'required|exists:outlets',
            'time' => 'required|date|after:now',
            'guests' => 'required|integer|min:1'
        ]);

        // $outlet = Outlet::where('outlet_name', $request->outlet_name)->first();
        // dd($request);
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'outlet_id' => $request->outlet_id,
            'time' => $request->time,
            'guests' => $request->guests,
            'user' => Auth::user()->name
        ]);


        return redirect('/bookings')->with('success', 'Booking created successfully!');
    }
}
