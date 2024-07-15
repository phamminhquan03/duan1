@extends('layout')
 
@section('content')
<div class="row" style="margin:20px;">
    <div class="col-12">
    <h2>Quản lý Sản Phẩm</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Thao tác</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->productname }}</td>
                <td>{{ $product->category->catname }}</td>
                <td>{{ $product->price }}</td>
              <td>  <img src="/images/{{ $product->image }}" width="100px"></td>
                <td>{{ $product->description }}</td>
                 <td>
                
                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-info">Sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                   
                    
                                    </td>
                
            </tr>
            @endforeach
        </tbody>
        </table>
        <a href="{{route('products.create')}}" class="btn btn-info">Thêm</a>
    </div>
</div> 
@endsection
