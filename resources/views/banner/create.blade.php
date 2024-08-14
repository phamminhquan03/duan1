@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm danh mục</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('banner.index') }}" class="btn btn-primary float-end">Danh sách Banner</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
 <div class="form-group">
                            <strong>Tên danh mục</strong>
                            <input type="file" name="image" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
        </div>
    </div>
    
</div>
@endsection
