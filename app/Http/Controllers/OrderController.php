<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create($slug)
    {
        $product = Product::where('slug', $slug)->first();
        
        return view('orders.create', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->no_order = 'SUSEA-' . strtoupper(str_random(10));
        $order->product_id = $request->product_id;
        $order->supplier = $request->supplier;
        $order->buyer = $request->buyer;
        $order->buyer_name = $request->buyer_name;
        $order->buyer_contact = $request->buyer_contact;
        $order->buyer_address = $request->buyer_address;
        $order->total = $request->total;
        $order->total_price = $request->total_price;
        $order->delivery_date = $request->delivery_date;
        $order->order_status = 'Menunggu Pembayaran';

        if($order->save()) {
            return redirect(route('order.detail', $order->no_order));
        }
    }

    public function detail($no_order)
    {
        $order = Order::where('no_order', $no_order)->first();
        $product = Product::find($order->product_id);
        
        if($order->buyer != Auth::user()->id) {
            return redirect('/');
        }

        return view('orders.detail', ['order' => $order, 'product' => $product]);
    }

    public function edit($no_order)
    {
        $order = Order::where('no_order', $no_order)->first();
        $product = Product::find($order->product_id);
        
        if($order->supplier != Auth::user()->id) {
            return redirect('/');
        }

        return view('orders.update', ['order' => $order, 'product' => $product]);
    }

    public function update($no_order, Request $request)
    {
        if (Order::where('no_order', $no_order)->update(['order_status' => $request->order_status])) {
            return redirect('/dashboard');
        }
    }
}
