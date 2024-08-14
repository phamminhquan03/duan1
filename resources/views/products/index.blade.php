@extends('admin.layout')

@section('content')
<style>
    /* Ensure that table layout is fixed to avoid stretching */
    .table {
        table-layout: fixed;
    }
    /* Apply styles to handle long text wrapping */
    .table td {
        max-width: 200px; /* Adjust as needed */
        word-wrap: break-word; /* Wrap long words */
        overflow-wrap: break-word; /* Handle text overflow */
        white-space: normal; /* Allow text to wrap */
    }
    /* Style for images to avoid stretching */
    .table img {
        max-width: 100px; /* Set a maximum width for images */
        height: auto; /* Maintain aspect ratio */
    }
</style>

<div class="row" style="margin:20px;">
    <div class="col-12">
        <div class="d-flex justify-content-between mb-5">
            <h2>Quản lý Sản Phẩm</h2>
            <a href="{{ route('products.create') }}" class="btn btn-info">Thêm</a>
        </div>
        <table class="table table-striped">
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
                    <td><img src="/images/{{ $product->image }}" alt="{{ $product->productname }}"></td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Sửa</a>
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
