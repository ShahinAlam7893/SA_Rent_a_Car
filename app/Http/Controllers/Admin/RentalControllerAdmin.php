<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmed;
use App\Mail\AdminRentalNotification;

class RentalControllerAdmin extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Fetch car
        $car = Car::findOrFail($validated['car_id']);

        // Calculate total cost (days * daily rent price)
        $days = (new \DateTime($validated['start_date']))->diff(new \DateTime($validated['end_date']))->days + 1;
        $totalCost = $car->daily_rent_price * $days;

        // Store rental
        $rental = Rental::create([
            'user_id' => $validated['user_id'],
            'car_id' => $validated['car_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $totalCost,
        ]);

        // Fetch user
        $user = User::findOrFail($validated['user_id']);

        // Send email to customer and admin
        Mail::to($user->email)->send(new RentalConfirmed($rental));
        Mail::to('admin@carrental.com')->send(new AdminRentalNotification($rental));

        return redirect()->back()->with('success', 'Rental created and emails sent.');
    }

    // Other CRUD methods (index, edit, update, destroy) can go here...
}
