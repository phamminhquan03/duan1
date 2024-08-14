@extends('admin.layout')
 
@section('content')
<div class="row" style="margin:20px;">
    <div class="col-12">
 <div class="d-flex justify-content-between mb-5">
    <h2>Quản lý tài khoản</h2>
    <a href="" class="btn btn-info">Thêm</a>
 </div>
    <table class="table  table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Thao tác</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($user as $us)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->password }}</td>
                <td>{{ $us->type }}</td>
             
                 <td>
                
                        <form action="" method="POST">
                        <a href="" class="btn btn-info">Sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                   
                    
                                    </td>
                
            </tr>
            @endforeach
        </tbody>
        </table>
     
    </div>
</div> 
@endsection
