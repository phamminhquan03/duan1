@extends('layout')
 
@section('content')
<div class="row" style="margin:20px;">
    <div class="col-12">
    <h2>Quản lý Sản Phẩm</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cate->catname }}</td>
                 <td>
                    <form action="{{route('categorys.destroy', $cate->id)}}" method="POST">
                        <a href="{{route('categorys.edit', $cate->id)}}" class="btn btn-info">Sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                                    </td>
                
            </tr>
            @endforeach
        </tbody>
        </table>
        <a href="{{route('categorys.create')}}" class="btn btn-info">Thêm</a>
    </div>
</div> 
@endsection
