<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dashboard.css') }}">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Astract 9</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ url('/logout') }}">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}"  href="{{route('vendor_dashboard')}}">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('user/add_product') ? 'active' : '' }}" href="{{route('vendor_add_product')}}">
              <span data-feather="bar-chart-2"></span>
              Add Product
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('user/all_products') ? 'active' : '' }}" href="{{route('vendor_all_product')}}">
              <span data-feather="shopping-cart"></span>
              View Product
            </a>
          </li>
        </ul>

    
      </div>
    </nav>

    @yield('content')



  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script type="text/javascript">
      $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
    </script>
</body>
</html>
