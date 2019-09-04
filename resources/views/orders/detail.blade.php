@extends('layouts.app')

@section('content')
<div class="container detail-order">
	<div class="card mx-auto" style="width: 500px;">
		<div class="card-body">
			<h4 class="card-title">No. Pesanan: {{$order->no_order}}</h4>
			<button class="btn btn-primary text-left" id="btnprint" style="position: relative;width:80px;" onclick="print()">Cetak <i class="material-icons" style="position: absolute;top: 50%;right:0;transform: translate(-50%, -50%);font-size: 16px;">print</i></button>
			
			<div class="mt-3" id="info-rekening">
				<section>
					<p>No Rekening: <b>123-456-789-0 (BCA)</b></p>
					<p>a.n. <b>Buk Susi</b></p>
				</section>
				<section>
					<p>No Rekening: <b>123-456-789-0 (BRI)</b></p>
					<p>a.n. <b>Buk Susi</b></p>
				</section>
			</div>

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
			
		</div>
	</div>
</div>
@endsection