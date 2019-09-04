@extends('layouts.app')

@section('content')
<div class="container detail-order">
	<div class="card mx-auto" style="width: 500px;">
		<div class="card-body">
			<h4 class="card-title">No. Pesanan: {{$order->no_order}}</h4>

			<div class="mt-3">
				<h4>Detail Pemesanan</h4>
				<p>Nama Pembeli : {{$order->buyer_name}}</p>
				<p>Kontak : {{$order->buyer_contact}}</p>
				<p>Alamat Pengiriman : {{$order->buyer_address}}</p>
				<p>Waktu Pengiriman : {{$order->delivery_date}}</p>
			</div>

			<div class="card mt-3">
				<div class="card-body">
					<p class="text-capitalize">{{$product->title}} ({{$order->total}} / {{$product->unit}}) <b class="float-right">Rp {{$product->price * $order->total}}</b></p>
					<p>Biaya Kirim <b class="float-right">Rp 30000</b></p>
					<p>Kode Unik <b class="float-right">{{$order->total_price - ($product->price * $order->total + 30000)}}</b></p>
					<p>Total Pembayaran <b class="float-right">Rp {{$order->total_price}}</b></p>
				</div>
			</div>
			
			<div class="mt-3">
				<form action="{{route('order.update', $order->no_order)}}" method="post">
					@csrf
					<input type="hidden" name="_method" value="PUT">
					<div class="form-group">
						<b>Status</b>
						<select class="form-control" id="order_status" name="order_status">
							<option value="Menunggu Pembayaran" class="text-capitalize" @if($order->order_status == "Menunggu Pembayaran") {{'selected'}} @endif>Menunggu Pembayaran</option>
							<option value="Sedang Diproses" class="text-capitalize" @if($order->order_status == "Sedang Diproses") {{'selected'}} @endif>Sedang Diproses</option>
							<option value="Proses Pengiriman" class="text-capitalize" @if($order->order_status == "Proses Pengiriman") {{'selected'}} @endif>Proses Pengiriman</option>
							<option value="Selesai" class="text-capitalize" @if($order->order_status == "Selesai") {{'selected'}} @endif>Selesai</option>
						</select>
						<button type="submit" class="btn btn-primary mt-1 w-100">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection