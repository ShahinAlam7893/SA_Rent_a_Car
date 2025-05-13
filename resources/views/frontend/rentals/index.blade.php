

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card wrapper -->
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4">{{ __('Book Your Appointment') }}</h3>

                    <form method="POST" action="{{ route('rentals.store') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>

                        <!-- Booking Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">Preferred Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <!-- Time Slot -->
                        <div class="mb-4">
                            <label for="time" class="form-label">Preferred Time</label>
                            <select name="time" id="time" class="form-select" required>
                                <option value="">Select a time slot</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="2:00 PM">2:00 PM</option>
                                <option value="4:00 PM">4:00 PM</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">
                                Confirm Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End card -->
        </div>
    </div>
</div>
{{-- @endsection --}}

    {{-- <h2>My Bookings</h2>
    <ul>
        @foreach($rentals as $rental)
            <li>
                <strong>{{ $rental->car->brand }} {{ $rental->car->model }}</strong> <br>
                From: {{ $rental->start_date }} to {{ $rental->end_date }} <br>
                Total: ${{ $rental->total_cost }}
            </li>
        @endforeach
    </ul> --}}
@endsection
