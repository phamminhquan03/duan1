<html>
<head>
    <title>Laravel 9 Join Two Tables</title>
   
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="header my-4">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
               
                  <li class="nav-item">
                    <a class="nav-link text-black fw-bold" href="{{route('products.index')}}">Quản lý sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black fw-bold" href="{{route('categorys.index')}}">Quản lý danh mục</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-black fw-bold" href="{{route('banner.index')}}">Quản lý banner</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    @yield('content')
</div>
</body>
</html>