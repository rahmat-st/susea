@extends('layouts.app')

@section('content')
<div class="container">
  <div class="scroll-wrapping">
    <p class="font-weight-bold m-0 p-0">Terbaru<a href="#" class="float-right" style="font-weight: normal;">Lihat Lainnya &raquo;</a></p>
    
    <ul class="hs full no-scrollbar py-2">
    @forelse ($products->orderBy('id', 'desc')->get() as $product)
      <li class="item">
        <img src="{{asset('/storage/'.$product->filename)}}" alt="">
        <div class="p-2">
          <a href="/product/{{$product->slug}}" class="text-capitalize text-dark font-weight-bold">{{$product->title}}</a>
          <p style="font-size: 12px;">Rp. {{$product->price}} / {{$product->unit}}</p>
        </div>
      </li>
    @empty
    @endforelse
    </ul>
  </div>
</div>
@endsection
