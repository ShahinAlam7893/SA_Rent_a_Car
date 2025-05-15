<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">SA Rent A Car</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
            href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('cars.index') ? 'active' : '' }}"
            href="{{ route('cars.index') }}">Cars</a></li>

        @auth
      <li class="nav-item"><a class="nav-link {{ request()->routeIs('rentals.index') ? 'active' : '' }}"
        href="{{ route('rentals.index') }}">Bookings</a></li>
    @endauth

        <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>

        @auth
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-link nav-link" style="padding: 0; border: none;">Logout</button>
        </form>
      </li>
    @else

      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>

    @endauth

      </ul>
    </div>
  </div>
</nav>