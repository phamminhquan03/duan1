@extends('layout')
 
@section('content')
<div class="row" style="margin:20px;">
    <div class="col-12">
    <h2>Quản lý Sản Phẩm</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Banner</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($banner as $bn)
            <tr>
        <td>{{$bn->id}}</td>
              <td>  <img src="/images/{{ $bn->image }}" width="100px"></td>
                 <td>
                
                        <form action="{{route('banner.destroy', $bn->id)}}" method="POST">
                        <a href="{{route('banner.edit', $bn->id)}}" class="btn btn-info">Sửa</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                   
                    
                                    </td>
                
            </tr>
            @endforeach
        </tbody>
        </table>
        <a href="{{route('banner.create')}}" class="btn btn-info">Thêm</a>
    </div>
</div> 
@endsection
