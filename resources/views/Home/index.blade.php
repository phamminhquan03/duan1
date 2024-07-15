

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
                      @if (Auth::user())
                      <div class="d-flex ps-2">
                       
                    
                        <p class=""><a class="link-opacity-100 text-light" href="{{route('logout')}}">Đăng xuat</a></p>
                       </div>
                      @else
                      <div class="d-flex ps-2">
                        <p class="px-2 "><a class="link-opacity-100 text-light" href="{{route('login.index')}}">Đăng nhập</a></p>
                        <p class=""><a class="link-opacity-100 text-light" href="../ass1/Trangđk.html">Đăng kí</a></p>
                       </div>
                       @endif
                  </div>
                  
                  
              </div>
              
              <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    @foreach ($banne as $index => $ba)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }} d-flex justify-content-center ">
                            <img src="/images/{{ $ba->image }}" class="d-block  w-100 " alt="..." style="height: 500px;">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
            
              

           <div class="container">
                         
            <div class="row" id="product-list">




      </div>
           </div>
           <div class="row ">

            
            <div class="col-lg bg-light border-end" style="width:  20%; height: calc(150vh - 56px); ">
                <h5 class="text-center pt-3">Danh mục sản phẩm</h5>
                <ul class="list-group ">
                   @foreach ($cate as $ct)
                   <a href="" class="text-decoration-none">  <li class="list-group-item">{{$ct->catname}}</li></a>
                   @endforeach
                </ul>
            </div>


            <div class="col-md-10">
             <div class="row">
              <h1 class="d-flex justify-content-center  fw-bold py-5">SẢN PHẨM BÁN CHẠY </h1>
              @foreach ($data as $dt)
              <div class="col-md-3">
                <div class="card border border-0">
                  <img src="/images/{{ $dt->image }}" style="wight:250px ; height:400px object-fit: cover;">
               <a class="text-black d-flex justify-content-center" style="text-decoration: none;" href="{{route('Home.show', $dt)}}"> <h5>{{$dt->productname}}</h5></a>
               <a class="text-black d-flex justify-content-center " style="text-decoration: none;" href="{{route('Home.show', $dt)}}"> <h5>${{$dt->price}}</h5></a>

              
                          <button class="btn btn-primary text-light bg-black addToCart"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                          </svg>Thêm vào giỏ hàng</button>
                    
                </div>
            </div>
            @endforeach
            
            
        
     
 
    
             </div>
                <!-- Nội dung chính của trang -->
                <!-- Ví dụ: -->
               
            </div>
            
        </div>
</body>
</html>


