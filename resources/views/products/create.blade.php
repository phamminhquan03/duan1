@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm sản phẩm mới</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products.index') }}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên sản phẩm</strong>
                            <input type="text" name="productname" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <strong>Danh mục</strong>
                            <select name="category_id" class="form-control">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->catname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <strong>Giá</strong>
                            <input type="text" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <strong>Ảnh</strong>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong>Mô tả</strong>
                            <input type="text" name="description" class="form-control" placeholder="Nhập mô tả">
                        </div>
                    
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
        </div>
    </div>
    
</div>

@endsection
