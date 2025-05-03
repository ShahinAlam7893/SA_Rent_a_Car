<?php

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;

class RentalController
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

        $rental = Rental::create([
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
        return view('frontend.rentals.index', compact('rentals'));
    }
}
return view('frontend.rentals.index', compact('rentals'));

