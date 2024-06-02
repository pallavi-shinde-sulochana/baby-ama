<header class="navbar navbar-dark sticky-top bg-white flex-md-nowrap p-0 pt-5">
  <nav class="navbar navbar-light">
    <div class="container-fluid">
      {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
      <button class="navbar-toggler sidebar-toggle" type="button">
        <i class="fas fa-bars h3 text-dark"></i>
      </button>
      <h2>Hi {{helperGetAuthUser('first_name')}}</h2>
    </div>
  </nav>
</header>