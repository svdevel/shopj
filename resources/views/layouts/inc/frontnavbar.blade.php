<nav class="navbar navbar-expand-lg sticky-top navbar-light shadow bg-white">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ asset('assets/images/Logo.png') }}" alt="" width="120px"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('categories-u') }}">Catégories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('panier') }}">Panier
                <span class="badge badge-pill text-dark cart-count"></span>
            </a>
          </li>
          @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ url('mes-commandes')}}">
                      Mes commandes
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Se déconnecter') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

                </ul>
            </li>

        @endguest
        </ul>
      </div>
    </div>
</nav>



