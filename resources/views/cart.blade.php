@extends('layouts.app')

@section('content')
<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Sản phẩm</th>
                <th style="width:10%">Giá</th>
                <th style="width:8%">Số lượng</th>
                <th style="width:22%" class="text-center">Tổng</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="{{ asset('images/' . $details['image']) }}" width="100" height="100" class="img-responsive" alt="{{ $details['productname'] }}"/>

                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['productname'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ number_format($details['price'], 2) }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove">
                                <i class="fa fa-trash-o"></i> Xóa
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong>Tổng ${{ number_format($total, 2) }}</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{route('Home.index')}}" class="btn btn-danger">
                        <i class="fa fa-arrow-left"></i>Tiếp tục mua
                    </a>
                   <a href="{{route('orders.create')}}">
                    <button class="btn btn-success">
                        <i class="fa fa-money"></i> Đặt hàng
                    </button>
                   </a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // Update cart item quantity
        $(".cart_update").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest("tr").data("id"),
                    quantity: ele.val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        // Remove cart item
        $(".cart_remove").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.closest("tr").data("id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
