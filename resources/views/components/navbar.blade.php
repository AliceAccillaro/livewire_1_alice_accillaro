<nav class="navbar navbar-expand-lg bg-body-tertiary main-navbar">
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ route('homepage') }}">Home</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="{{ route('homepage') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts') }}">Tutti i post</a>
        </li>
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">

            @auth
                Ciao, {{ auth()->user()->name }}
            @else
                Ciao, Ospite
            @endauth

          </a>

          <ul class="dropdown-menu">

            @guest

                <li>
                    <a class="dropdown-item" href="{{ route('login') }}">
                        Login
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('register') }}">
                        Register
                    </a>
                </li>

            @endguest


            @auth

                <li>
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            Logout
                        </button>
                    </form>
                </li>

            @endauth

          </ul>

        </li>

      </ul>

    </div>
  </div>
</nav>