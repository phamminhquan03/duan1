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
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme CSS -->

    <style>
        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }
        .color-swatches {
            display: flex;
            gap: 10px;
        }
        .color-swatches input[type="radio"] {
            display: none;
        }
        .color-swatches label {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #ddd;
            cursor: pointer;
            transition: border-color 0.3s;
        }
        .color-swatches input[type="radio"]:checked + label {
            border-color: #000;
        }
        .color-swatches .color-red { background-color: red; }
        .color-swatches .color-blue { background-color: blue; }
        .color-swatches .color-black { background-color: black; }
        .color-swatches .color-white { background-color: white; border: 2px solid #000; }
        .product-card {
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .footer {
            background-color: #343a40;
            color: #fff;
        }
        .dropdown{
    float:right;
    padding-right: 30px;
}
.btn{
    border:0px;
    margin:10px 0px;
    box-shadow:none !important;
}
.dropdown .dropdown-menu{
    padding:20px;
    top:30px !important;
    width:350px !important;
    left:-110px !important;
    box-shadow:0px 5px 30px black;
}
.total-header-section{
    border-bottom:1px solid #d2d2d2;
}
.total-section p{
    margin-bottom:20px;
}
.cart-detail{
    padding:15px 0px;
}
.cart-detail-img img{
    width:100%;
    height:100%;
    padding-left:15px;
}
.cart-detail-product p{
    margin:0px;
    color:#000;
    font-weight:500;
}
.cart-detail .price{
    font-size:12px;
    margin-right:10px;
    font-weight:500;
}
.cart-detail .count{
    color:#000;
}

.dropdown-menu:before{
    content: " ";
    position:absolute;
    top:-20px;
    right:50px;
    border:10px solid transparent;
    border-bottom-color:#fff;
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
                        <a class="nav-link active" aria-current="page" href="{{ route('Home.index') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=vd.html">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="detail.html">Các sản phẩm khác</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('checkout')}}">Đơn mua</a>
                    </li>
                </ul>
                <form class="d-flex ms-lg-4" role="search" action="" method="GET">
                    <input class="form-control mt-2" type="search" name="query" placeholder="Search" aria-label="Search" style="height: 30px;">
                    <button class="btn btn-outline-dark" style="height: 30px;" type="submit">Search</button>
                </form>
                <div class="d-flex align-items-center ms-3">
                    @if (Auth::check())
                        <div class="ps-2">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button class="btn text-dark me-3" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                <span id="cartItemCount" class="badge bg-danger rounded-pill">{{ count((array) session('cart')) }}</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" style="max-width: 300px;">
                                <div class="row total-header-section">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach((array) session('cart') as $id => $details)
                                        @php
                                            $total += $details['price'] * $details['quantity'];
                                        @endphp
                                    @endforeach
                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                        <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                    </div>
                                </div>
                            
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ asset('images') }}/{{ $details['image'] }}" alt="{{ $details['productname'] }}" class="img-fluid"/>
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{ $details['productname'] }}</p>
                                                <span class="price text-info"> ${{ $details['price'] }}</span>
                                                <span class="count"> Số lượng:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" style="text-decoration: none; color: black;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('login') }}">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">Đăng Ký</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-3 bg-light border-end">
                <h5 class="text-center pt-3">Danh mục sản phẩm</h5>
                <ul class="list-group">
                    @foreach ($categories as $ct)
                        <a href="#" class="text-decoration-none">
                            <li class="list-group-item">{{ $ct->catname }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="/images/{{ $product->image }}" class="img-fluid" alt="{{ $product->productname }}">
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $product->productname }}</h1>
                        <h3 class="text-danger mt-3">${{ $product->price }}</h3>
                        <div class="mt-4">
                            <h5>Kích thước:</h5>
                            <div class="d-flex ">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size" id="sizeS" value="S">
                                    <label class="form-check-label" for="sizeS">S</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size" id="sizeM" value="M">
                                    <label class="form-check-label" for="sizeM">M</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size" id="sizeL" value="L">
                                    <label class="form-check-label" for="sizeL">L</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size" id="sizeXL" value="XL">
                                    <label class="form-check-label" for="sizeXL">XL</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5>Màu sắc:</h5>
                            <div class="color-swatches">
                                <input type="radio" id="colorRed" name="color" value="Red">
                                <label for="colorRed" class="color-red" title="Đỏ"></label>
                                
                                <input type="radio" id="colorBlue" name="color" value="Blue">
                                <label for="colorBlue" class="color-blue" title="Xanh dương"></label>
                                
                                <input type="radio" id="colorBlack" name="color" value="Black">
                                <label for="colorBlack" class="color-black" title="Đen"></label>
                                
                                <input type="radio" id="colorWhite" name="color" value="White">
                                <label for="colorWhite" class="color-white" title="Trắng"></label>
                            </div>
                        </div>
                        <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary">
                            <i class="bi bi-caret-right-fill"></i> Thêm vào giỏ hàng
                        </a>
                        <div class="mt-5">
                            <h4>Mô tả:</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
