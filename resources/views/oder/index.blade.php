@extends('admin.layout')

@section('content')
<style>
    .table {
        table-layout: fixed;
    }
    .table td {
        max-width: 200px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }
    .table img {
        max-width: 100px;
        height: auto;
    }
</style>

<div class="row" style="margin:20px;">
    <div class="col-12">
        <div class="d-flex justify-content-between mb-5">
            <h2>Quản lý Đơn Hàng</h2>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        <ul>
                            @foreach ($order->orderItems as $item)
                                <li>
                                    {{ $item->productname }} - 
                                    ${{ number_format($item->price, 2) }} x {{ $item->quantity }}
                                    @if ($item->image)
                                        <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->productname }}">
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn có muốn hủy đơn hàng này không?');">
                            @csrf
                            @method('DELETE')
                           <a href="{{route('checkout')}}">
                            <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                           </a>
                        </form>
                        @if (!$order->is_in_delivery)
                        <form action="{{ route('orders.approve', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Duyệt</button>
                        </form>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
