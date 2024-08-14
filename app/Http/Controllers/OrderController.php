<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // Hiển thị tất cả đơn hàng
    public function index()
    {
        $orders = Order::with('orderItems')->get(); // Eager load order items
        return view('oder.index', compact('orders'));
    }
    public function checkoutindex()
    {
        $orders = Order::with('orderItems')->get(); // Eager load order items
        return view('checkout', compact('orders'));
    }

    // Hiển thị form tạo đơn hàng
    public function create()
    {
      
 
        return view('oder.create ');
    }

    // Lưu đơn hàng mới
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);
    
        // Create a new order
        $order = Order::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
    
        // Get cart details from session
        $cart = session('cart');
    
        // Save each item in the cart to order_items
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'productname' => $details['productname'],
                'image' => $details['image'],
                'price' => $details['price'],
                'quantity' => $details['quantity'],
            ]);
        }
    
        // Clear the cart
        session()->forget('cart');
    
        // Redirect or return a response
        return redirect()->route('Home.index')->with('success', 'Order created successfully.');
    }

    // Hiển thị form chỉnh sửa đơn hàng
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Cập nhật đơn hàng
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')
                         ->with('success', 'Order updated successfully.');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Đã bị hủy';
        $order->save();

        return redirect()->route('checkout')->with('success', 'Đơn hàng đã bị hủy.');
    }
    public function checkoutdestroy($id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        // Kiểm tra xem đơn hàng có tồn tại không
        if ($order) {
            // Xóa đơn hàng
            $order->delete();

            // Chuyển hướng với thông báo thành công
            return redirect()->route('checkout')->with('success', 'Đơn hàng đã được xóa.');
        } else {
            // Chuyển hướng với thông báo lỗi nếu không tìm thấy đơn hàng
            return redirect()->route('checkout')->with('error', 'Đơn hàng không tồn tại.');
        }
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->is_in_delivery = true;
        $order->status = 'Đang giao';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được duyệt.');
    }
    public function deleteProduct($id)
{
    $order = Order::findOrFail($id);

    // Assuming you have logic to delete products related to this order
    // $order->orderItems()->delete();

    return redirect()->route('orders.index')->with('success', 'Sản phẩm đã bị xóa.');
}
public function processPayment(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        // Kiểm tra xem đơn hàng có tồn tại không
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        // Xử lý thanh toán (Ví dụ: cập nhật trạng thái đơn hàng)
        $paymentMethod = $request->input('payment_method');
        $order->status = 'Đã thanh toán qua ' . $paymentMethod;
        $order->save();

        // Tính tổng tiền của đơn hàng
        $total = $order->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Hiển thị hóa đơn
        return view('order.bill', compact('order', 'total', 'paymentMethod'));
    }

    
}
