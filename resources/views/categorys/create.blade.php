@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Thêm danh mục</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('categorys.index') }}" class="btn btn-primary float-end">Danh sách sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="{{ route('categorys.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>iD</strong>
                            <input type="text" name="id" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <strong>Tên danh mục</strong>
                            <input type="text" name="catname" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection
