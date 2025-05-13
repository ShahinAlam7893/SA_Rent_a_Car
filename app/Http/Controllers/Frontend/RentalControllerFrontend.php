<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalControllerFrontend extends Controller
{
    public function create(Car $car)
    {
        return view('frontend.rentals.create', compact('car'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $car = Car::findOrFail($validated['car_id']);
        $days = (new \DateTime($validated['start_date']))->diff(new \DateTime($validated['end_date']))->days + 1;
        $totalCost = $car->daily_rent_price * $days;

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $totalCost
        ]);

        return redirect()->route('rentals.index')->with('success', 'Booking Confirmed!');
    }

    public function index()
    {
        $rentals = Rental::where('user_id', Auth::id())->latest()->get();
        return view('frontend.rentals.index', compact('rentals'));
    }
}
