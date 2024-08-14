@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Sửa danh mục</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('banner.index') }}" class="btn btn-primary float-end">Danh sách Banner</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <strong>Hình ảnh hiện tại</strong>
                            <div>
                                <img src="{{ asset('images/' . $banner->image) }}" style="max-height: 200px;" alt="Hình ảnh hiện tại">

                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <strong>Thay đổi hình ảnh</strong>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>
            </form>
        </div>
        
    </div>
</div>
@endsection
