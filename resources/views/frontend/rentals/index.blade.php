@extends('layouts.app')

@section('content')
    <h2>My Bookings</h2>
    <ul>
        @foreach($rentals as $rental)
            <li>
                <strong>{{ $rental->car->brand }} {{ $rental->car->model }}</strong> <br>
                From: {{ $rental->start_date }} to {{ $rental->end_date }} <br>
                Total: ${{ $rental->total_cost }}
            </li>
        @endforeach
    </ul>
@endsection
