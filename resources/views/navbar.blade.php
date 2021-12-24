<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/tampilan')}}">Tampilan Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Tambah Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>