@extends('layouts.app')

@section('content')
    <h1>Available Cars</h1>
    <div class="car-list">
        @foreach($cars as $car)
            <div class="car-card">
                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                <h2>{{ $car->brand }} {{ $car->model }}</h2>
                <p>Type: {{ $car->car_type }}</p>
                <p>Year: {{ $car->year }}</p>
                <p>Rent: ${{ $car->daily_rent_price }}/day</p>
                <a href="{{ route('rentals.create', $car->id) }}">Book Now</a>
            </div>
        @endforeach
    </div>
@endsection
