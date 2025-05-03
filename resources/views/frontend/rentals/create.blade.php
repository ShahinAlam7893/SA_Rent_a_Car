@extends('layouts.app')

@section('content')
    <h2>Book Car: {{ $car->brand }} {{ $car->model }}</h2>
    <form method="POST" action="{{ route('rentals.store') }}">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->id }}">

        <label>Start Date:</label>
        <input type="date" name="start_date" required>

        <label>End Date:</label>
        <input type="date" name="end_date" required>

        <button type="submit">Confirm Booking</button>
    </form>
@endsection
