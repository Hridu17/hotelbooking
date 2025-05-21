<header class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.index') }}">Admin Panel</a>
      <div>
          <a href="{{ route('logout') }}" class="btn btn-sm btn-light"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </div>
</header>
