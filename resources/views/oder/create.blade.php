<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cool Clothes</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- jQuery and Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            margin-right: 15px;
        }
        .navbar-nav .nav-link.active {
            color: #007bff;
        }
        .btn {
            border: 0;
            box-shadow: none !important;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004080;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .cart-item img {
            max-width: 100px;
            height: auto;
        }
        .cart-item .product-name {
            font-weight: bold;
        }
        .total-section {
            border-top: 2px solid #007bff;
            padding-top: 10px;
        }
        .alert-success {
            margin-bottom: 20px;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('Home.index') }}">Cool Clothes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Home.index') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vd.html">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="detail.html">Các sản phẩm khác</a>
                    </li>
                </ul>
                <form class="d-flex ms-lg-4" role="search" action="" method="GET">
                    <input class="form-control" type="search" name="query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
                <div class="d-flex align-items-center ms-3">
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                <span id="cartItemCount" class="badge bg-danger rounded-pill">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="total-header-section">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach((array) session('cart') as $id => $details)
                                        @php
                                            $total += $details['price'] * $details['quantity'];
                                        @endphp
                                    @endforeach
                                    <p class="text-end mb-0">Total: <strong class="text-info">$ {{ number_format($total, 2) }}</strong></p>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="cart-item d-flex align-items-center mb-2">
                                            <div class="me-2">
                                                <img src="{{ asset('images/' . $details['image']) }}" alt="{{ $details['productname'] }}" class="img-fluid"/>
                                            </div>
                                            <div>
                                                <p class="product-name mb-1">{{ $details['productname'] }}</p>
                                                <p class="mb-1"><span class="price text-info">$ {{ number_format($details['price'], 2) }}</span> <span class="count">x {{ $details['quantity'] }}</span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Xem tất cả</a>
                            </div>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-dark">Đăng xuất</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div>
                            <a class="nav-link text-dark" href="{{ route('login') }}">Đăng nhập</a>
                            <a class="nav-link text-dark" href="{{ route('register') }}">Đăng Ký</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <!-- Order Details -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Chi tiết đơn hàng</h3>
                    </div>
                    <div class="card-body">
                        @if(session('cart'))
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(session('cart') as $id => $details)
                                        <tr data-id="{{ $id }}">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('images/' . $details['image']) }}" class="img-fluid me-2" width="100" height="100" alt="{{ $details['productname'] }}"/>
                                                    <h5 class="mb-0">{{ $details['productname'] }}</h5>
                                                </div>
                                            </td>
                                            <td>${{ number_format($details['price'], 2) }}</td>
                                            <td>
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                                            </td>
                                            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm cart_remove">
                                                    <i class="fa fa-trash-o"></i> Xóa
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <div class="total-section mt-4">
                            @php
                                $total = 0;
                            @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php
                                    $total += $details['price'] * $details['quantity'];
                                @endphp
                            @endforeach
                            <p class="text-end mb-0">Total: <strong class="text-info">$ {{ number_format($total, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Form -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Đơn hàng</h3>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Tên</strong></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label"><strong>Địa chỉ</strong></label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label"><strong>Phone</strong></label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                            </div>
                         <a href="">
                            <button type="submit" class="btn btn-success">Đặt hàng</button>
                         </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-4">
        <p>&copy; 2024 Cool Clothes. All rights reserved.</p>
    </footer>
</body>
</html>
