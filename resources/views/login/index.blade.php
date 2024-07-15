


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
        
            <div class="menu bg-black d-flex justify-content-between  p-3 mb-3">
      
                  <div class="nav d-flex pt-1 ps-5">
                      <div class="logo ps-5">
                        
                      </div>
                      <ul class="nav text-light pt-2">
                          <li class="nav-item">
                              <a class="nav-link text-light   " href="{{route('Home.index')}}">Trang chủ</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-light" href="add.html">Liên hệ</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-light" href="detail.html">Các sản phẩm khác</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-light" href="{{route('products.index')}}">Admin</a>
                          </li>
                       
                      </ul>
                       </ul>
                  </div>
                  <form class="d-flex pt-3" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="height: 30px;">
                      <button class="btn btn-outline-light" style="height: 30px;" type="submit">Search</button>
                    </form>
                 
                  <div class="icon text-light pt-3 d-flex justify-content-between " >
                 <div class="text-light">
                  <button class="btn text-light" data-bs-toggle="modal" data-bs-target="#cartModal" >
                    <i class="fa-solid fa-cart-shopping fa-xl " ></i>
                    <!-- Span chứa số lượng sản phẩm trong giỏ hàng -->
                    <span id="cartItemCount" class="badge bg-danger rounded-pill">0</span>
                </button>
                 </div>
                      <div style="width: 10px;"></div> <!-- Khoảng cách -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                      </svg>
                      <div class="d-flex ps-2">
                        <p class="px-2 "><a class="link-opacity-100 text-light" href="../ass1/Trangđn.html">Đăng nhập</a></p>
                        <p class=""><a class="link-opacity-100 text-light" href="../ass1/Trangđk.html">Đăng kí</a></p>
                       </div>
                  </div>

            </div>
            <form action="{{route('login.show')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>