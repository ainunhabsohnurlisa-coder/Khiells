<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:30',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
            'cart_items' => 'required', // json string or array
            'voucher_code' => 'nullable|string',
        ]);

        $cartItems = is_array($validated['cart_items']) 
            ? $validated['cart_items'] 
            : json_decode($validated['cart_items'], true);

        if (empty($cartItems)) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong.'], 400);
        }

        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += ($item['price'] * $item['qty']);
        }

        $shippingFee = $subtotal >= 150000 ? 0 : 15000;
        $discountAmount = 0;

        if (strtoupper(trim($validated['voucher_code'] ?? '')) === 'KHIELLS10') {
            $discountAmount = (int) round($subtotal * 0.10);
        }

        $totalAmount = max(0, $subtotal + $shippingFee - $discountAmount);
        $orderNumber = 'KH-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));

        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => Auth::id(),
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'shipping_address' => $validated['shipping_address'],
            'payment_method' => $validated['payment_method'],
            'payment_status' => $validated['payment_method'] === 'COD' ? 'pending' : 'paid',
            'order_status' => 'diproses',
            'subtotal' => $subtotal,
            'discount_amount' => $discountAmount,
            'shipping_fee' => $shippingFee,
            'total_amount' => $totalAmount,
            'items_json' => $cartItems,
            'notes' => $request->input('notes'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat!',
            'order_number' => $order->order_number,
            'total_amount' => $order->total_amount,
        ]);
    }
}
