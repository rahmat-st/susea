@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card p-4">
        <div class="row">
          <img id="product-image" class="col-md-4" src="{{asset('/storage/'.$product->filename)}}" alt="">
          <div class="col-md-8 pl-2">
            <h4 class="card-title text-capitalize">{{$product->title}}</h4>
            <p class="font-weight-bold">Rp {{$product->price}}/{{$product->unit}}</p>
            <p>Tersedia : {{$product->stock}} {{$product->unit}}</p>
            <b>Keterangan :</b>
            <p>{{$product->description}}</p>
            @if (!Auth::guest())
              @if ($product->user_id == Auth::user()->id)
                <a href="/edit/product/{{$product->id}}" class="btn btn-primary w-100 py-2">Edit Produk</a>
              @else
                <a href="/order/{{$product->slug}}" class="btn btn-lg btn-primary w-100">Pesan Sekarang</a>
              @endif
            @else
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-lg w-100" data-toggle="modal" data-target="#isLogin">
                Pesan Sekarang
              </button>
              
              <!-- Modal -->
              <div class="modal fade text-center" id="isLogin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <button type="button" class="close text-right mt-3 mr-3" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body py-5">
                      <h5>Anda belum Login!!<br>Silahkan Login terlebih dahulu untuk memesan.</h5>
                      <a href="/order/{{$product->slug}}" class="btn btn-primary">Login</a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="card mt-3 p-4">
        @if (count($ratings) > 0)
          @foreach ($ratings as $rating)
            @php
              $user = \App\User::find($rating->rate_by);
            @endphp
            <div class="row mt-2">
              <img src="{{asset('storage/'.$user->avatar)}}" alt="" class="rounded-circle col-2 col-md-1" style="height: 30px !important">
              <div class="col-10 col-md-11 p-0">
                <p class="mb-1">{{$user->fullname}} <b class="float-right pr-3">{{$rating->rating}}</b></p>
                <i>"{{$rating->comment}}"</i>
              </div>
            </div>
          @endforeach
        @else
          <p class="text-center font-italic m-0">Belum Ada Penilaian</p>
        @endif

        @auth
          @if ($product->user_id != Auth::user()->id)
            @if (count($rateExist) == 0)
            <div class="card mt-3">
              <div class="card-body">
                <form action="{{route('rating.create', $product->id)}}" method="POST">
                  @csrf
                  <input type="hidden" name="rate_by" value="{{Auth::user()->id}}">
                  <div class="form-group">
                    <b for="rating" id="inforating">Rating : </b>
                    <input type="range" class="custom-range w-25 float-right" name="rating" min="1" max="5" id="rating" value="1">
                  </div>
                  <div class="form-group">
                    <label for="comment">Komentar</label>
                    <textarea class="form-control" name="comment" id="comment" cols="100%" rows="5" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
              </div>
            </div>
            @endif
          @endif
        @endauth
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3">
        <div class="row ">
          <img id="supplier-avatar" class="col-2 col-md-4 rounded-circle" src="{{asset('/storage/'.$supplier->avatar)}}" alt="">
          <a href="{{'/user/'.$supplier->username}}" class="card-title text-dark col-10 col-md-8 pl-0 text-capitalize my-auto">{{$supplier->fullname}}</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // console.log();
    $('#supplier-avatar').height($('#supplier-avatar').width());
    $('#inforating').text('Rating : ' + $('#rating').val());

    $('#rating').change(function() {
      $('#inforating').text('Rating : ' + $(this).val());
    });
  });
</script>
@endsection