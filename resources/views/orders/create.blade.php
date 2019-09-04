@extends('layouts.app')

@section('content')
<div class="container">
  <form class="row" method="post" action="{{ route('order.store', $product->slug) }}">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="hidden" name="supplier" value="{{$product->user_id}}">
    <input type="hidden" name="buyer" value="{{Auth::user()->id}}">
    <div class="col-md-8">
      <div class="card p-4">
        <h4>Info Pemesanan</h4>
        <hr class="my-2">

        <select name="delivery_date" id="delivery_date" class="form-control mt-2 mb-4" required>
          <option disabled selected value="">Tanggal Pengiriman</option>
          @for ($i = 3; $i <= 10; $i++)
            @php
              $hari = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
              $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
              $tgl = date("N j n Y", strtotime("+$i day"));
              $tgl = explode(' ', $tgl);
              
              $delivery_date = $hari[$tgl[0] - 1] . ', ' . $tgl[1] . ' ' . $bulan[$tgl[2] - 1] . ' ' . $tgl[3];
            @endphp
            <option value="{{$delivery_date}}">{{$delivery_date}}</option>
          @endfor
        </select>

        <div class="form-group row">
            <label for="buyer_name" class="col-md-4 col-form-label">{{ __('Nama Pembeli') }}</label>
            <div class="col-md-8">
                <input id="buyername" type="text" class="form-control" name="buyer_name" value="{{Auth::user()->fullname}}" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="contact" class="col-md-4 col-form-label">{{ __('Kontak yang bisa dihubungi') }}</label>
            <div class="col-md-8">
                <input id="contact" type="text" class="form-control" name="buyer_contact" value="{{Auth::user()->phone}}" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label">{{ __('Alamat') }}</label>
            <div class="col-md-8">
                <textarea id="address" class="form-control" name="buyer_address" required autofocus>{{Auth::user()->address}}</textarea>
            </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-4">
        <h4>Ringkasan</h4>
        <hr class="my-2">
        <div class="row">
          <p class="col">Harga</p>
          <p class="col text-right">Rp {{$product->price}} / {{$product->unit}}</p>
          <p class="d-none" id="harga">{{$product->price}}</p>
        </div>
        <div class="row">
          <p class="col">Jumlah pesanan</p>
          <div class="col text-right form-group row align-middle">
            <input type="number" class="form-control form-control-sm offset-4 col-4 text-right" value="1" min="1" max="{{$product->stock}}" id="jumlah" name="total">
            <span class="col">{{$product->unit}}</span>
          </div>
        </div>
        <hr>
        <div class="row">
          <p class="col">Kode Unik</p>
          <p class="col text-right kodeunik"></p>
        </div>
        <div class="row">
          <p class="col">Biaya Kirim</p>
          <p class="col text-right">Rp 30000</p>
        </div>
        <div class="row">
          <b class="col">Total pembayaran</b>
          <p class="col text-right font-weight-bold" id="ptotalharga"></p>
        </div>
        <input type="hidden" name="total_price" id="totalharga">
        <button class="btn btn-primary mt-3" type="submit">Bayar</button>
      </div>
    </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    var kodeunik = $('.kodeunik').html(Math.floor(Math.random() * (999 - 500) + 500));
    var totalharga = $('#jumlah').val() * parseInt($('#harga').html()) + 30000;
    $('#ptotalharga').html(totalharga + parseInt(kodeunik.html()));
    $('input#totalharga').val(parseInt($('#ptotalharga').html()));

    $('#jumlah').change(function() {
      totalharga = $('#jumlah').val() * parseInt($('#harga').html()) + 30000;
      $('#ptotalharga').html(totalharga + parseInt(kodeunik.html()));
      $('input#totalharga').val(parseInt($('#ptotalharga').html()));

    });
  });
</script>
@endsection