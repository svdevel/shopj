<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-2.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ url('/')}}">
      <img src="{{ asset('assets/images/Logo.png')}}" alt="Logo" style="width: 120px;" class="ml-5">
    </a>
  </div>

  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}">
        <a class="nav-link " href="{{ url('dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p>Tableau de bord</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
        <a class="nav-link " href="{{ url('categories')}}">
          <i class="material-icons">dashboard</i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item  {{ Request::is('add-categorie') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('add-categorie')}}">
          <i class="material-icons">add_circle_outline</i>
          <p>Ajouter une Categorie</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('articles') ? 'active':'' }}">
        <a class="nav-link " href="{{ url('articles')}}">
          <i class="material-icons">dashboard</i>
          <p>Articles</p>
        </a>
      </li>
      <li class="nav-item  {{ Request::is('add-article') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('add-article')}}">
          <i class="material-icons">add_circle_outline</i>
          <p>Ajouter un Article</p>
        </a>
      </li>
      <li class="nav-item  {{ Request::is('commandes') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('commandes')}}">
          <i class="material-icons">content_paste</i>
          <p>Commandes</p>
        </a>
      </li>
      {{-- <li class="nav-item  {{ Request::is('users') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('users')}}">
          <i class="material-icons">person</i>
          <p>Utilisateurs</p>
        </a>
      </li> --}}
      <li class="nav-item">
        <div>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">settings_power</i>{{ __('Déconnexion') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</div>