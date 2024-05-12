


      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('my-blogs') }}">My Blogs</a>
                    </li>
                    @auth
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Log out</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning ml-2" href="{{ route('add-blog') }}">Add Blog</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-warning" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-warning ml-2" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>

           
            </div>
        </div>
    </nav>
  