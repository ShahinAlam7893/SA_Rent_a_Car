
     <!-- Navbar -->
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">SA Rent A Car</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="{{route('home')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('cars.index')}}">Cars</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('rentals.index')}}">My Bookings</a></li>
          <li class="nav-item"><a class="nav-link" href="{{'contact'}}">Contact</a></li>
          <li>
            <a class="nav-link" href="{{'about'}}">About</a>
          </li>
          <li>
            @auth
             <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
    @endauth
          </li>
    
        </ul>
      </div>
    </div>

</nav>