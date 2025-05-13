@extends('layouts.app')

@section('content')
<div>
 

  <!-- Hero -->
  <div class="hero">
    <div class="container">
      <h1>Drive Your Dream Car Today</h1>
      <p class="lead">Affordable. Reliable. Convenient.</p>
      <a href="{{route('rentals.index')}}" class="btn btn-primary btn-lg mt-3">Book Now</a>
    </div>
  </div>

  <!-- Services -->
  <section class="py-5 text-center">
    <div class="container">
      <h2 class="mb-4">Our Services</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-2 service-icon">🚗</div>
          <h5>Daily Car Rentals</h5>
          <p>Choose from a wide range of vehicles for your day-to-day needs.</p>
        </div>
        <div class="col-md-4">
          <div class="mb-2 service-icon">💼</div>
          <h5>Corporate Packages</h5>
          <p>Reliable car rental options for businesses and professionals.</p>
        </div>
        <div class="col-md-4">
          <div class="mb-2 service-icon">⭐</div>
          <h5>Luxury & Premium Cars</h5>
          <p>Drive premium vehicles for weddings, events, or special occasions.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Cars -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Featured Cars</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="https://source.unsplash.com/400x250/?sedan,car" class="card-img-top" alt="Sedan">
            <div class="card-body">
              <h5 class="card-title">Toyota Corolla</h5>
              <p class="card-text">$40/day • Automatic • A/C</p>
              <a href="#" class="btn btn-outline-primary">Rent Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="https://source.unsplash.com/400x250/?suv,car" class="card-img-top" alt="SUV">
            <div class="card-body">
              <h5 class="card-title">Honda CR-V</h5>
              <p class="card-text">$55/day • Automatic • GPS</p>
              <a href="#" class="btn btn-outline-primary">Rent Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="https://source.unsplash.com/400x250/?luxury,car" class="card-img-top" alt="Luxury">
            <div class="card-body">
              <h5 class="card-title">BMW 5 Series</h5>
              <p class="card-text">$120/day • Luxury • Leather Seats</p>
              <a href="#" class="btn btn-outline-primary">Rent Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </body>

</html>


</div>
@endsection

@section('login')

@include('auth.login')

@endsection
