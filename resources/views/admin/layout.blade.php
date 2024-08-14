
<!DOCTYPE html>
<!--
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_laravel
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">

  <title></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
  
  <!-- CSRF Token -->
  <meta name="_token" content="tTwOh80lZnYHexwaMwy7zzaWlU2iGmlI2dqunnBY">
  
  <link rel="shortcut icon" href="https://www.nobleui.com/laravel/template/demo1-ds/favicon.ico">

  <!-- plugin css -->
  <link href="https://www.nobleui.com/laravel/template/demo1-ds/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
  <link href="https://www.nobleui.com/laravel/template/demo1-ds/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
  <!-- end plugin css -->

    <link href="https://www.nobleui.com/laravel/template/demo1-ds/assets/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" />

  <!-- common css -->
  <link href="https://www.nobleui.com/laravel/template/demo1-ds/css/app.css" rel="stylesheet" />
  <!-- end common css -->

  </head>
<body class="sidebar-dark" data-base-url="https://www.nobleui.com/laravel/template/demo1-ds">

  <script src="https://www.nobleui.com/laravel/template/demo1-ds/assets/js/spinner.js"></script>

  <div class="main-wrapper" id="app">
    <nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">

      <li class="nav-item nav-category">web apps</li>
      <li class="nav-item ">
        <a class="nav-link" data-bs-toggle="collapse" href="{{route('products.index')}}" role="button" aria-expanded="false" aria-controls="email">
          <span class="link-title">Quản lý sản phẩm</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{route('categorys.index')}}" class="nav-link">
          <span class="link-title">Quản lý danh mục</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{route('banner.index')}}" class="nav-link">
          <span class="link-title">Quản lý banner</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{route('orders.index')}}" class="nav-link">
          <span class="link-title">Quản lý đơn hàng</span>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{route('Home.index')}}" class="nav-link">
          <span class="link-title">Trở về trang User</span>
        </a>
      </li>

    </ul>
  </div>
</nav>
<nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted mb-2">Sidebar:</h6>
    <div class="mb-3 pb-3 border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
    <div class="theme-wrapper">
      <h6 class="text-muted mb-2">Light Version:</h6>
      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/demo1/">
        <img src="https://www.nobleui.com/laravel/template/demo1-ds/assets/images/screenshots/light.jpg" alt="light version">
      </a>
      <h6 class="text-muted mb-2">Dark Version:</h6>
      <a class="theme-item" href="https://www.nobleui.com/laravel/template/demo2/">
        <img src="https://www.nobleui.com/laravel/template/demo1-ds/assets/images/screenshots/dark.jpg" alt="light version">
      </a>
    </div>
  </div>
</nav>    <div class="page-wrapper">
      <nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-text">
          <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
      </div>
    </form>
 
  </div>
</nav>      <div class="page-content">
        <div class="">

  @yield('content')

 <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
</footer>    </div>
  </div>

    <!-- base js -->
</body>
</html>