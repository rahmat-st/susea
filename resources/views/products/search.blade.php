@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-3 mt-3">
        <div class="card">
          <img class="card-img-top" src="holder.js/100x180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Text</p>
          </div>
        </div>
      </div>

      <div class="col-9">
        <div class="row">
          @forelse ($products as $product)
            <div class="col-6 col-md-3 mt-3">
              <div class="card shadow-sm" style="min-height: 220px;max-height: 220px">
                <img class="card-img-top" src="{{asset('storage/'.$product->filename)}}" alt="" height="120">
                <div class="card-body p-3">
                  <a href="{{'/product/'.$product->slug}}" class="card-title text-capitalize text-dark">{{$product->title}}</a>
                  <b class="card-text d-block">Rp {{$product->price}}</b>
                </div>
              </div>
            </div>
          @empty
            <b class="mt-3">Tidak ada data</b>
          @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection