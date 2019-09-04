@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card bg-transparent border-0">
                {{-- <div class="card-header bg-white">{{ __('Akun Saya') }}</div> --}}
                <div class="card-header bg-transparent text-center">
                    <img src="{{asset('storage/'.Auth::user()->avatar)}}" class="mb-3 border border-white shadow rounded-circle" alt="" style="width: 150px; height: 150px; border-width: 5px !important;">
                    <h4>{{Auth::user()->fullname}}</h4>
                </div>

                <div class="card-body bg-white">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="changeCardHeader('Profil')">Profil</a>
                        <a class="nav-link" id="v-pills-change-password-tab" data-toggle="pill" href="#v-pills-change-password" role="tab" aria-controls="v-pills-change-password" aria-selected="false" onclick="changeCardHeader('Ubah Password')">Ubah Password</a>
                        <a class="nav-link" id="v-pills-product-tab" data-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false" onclick="changeCardHeader('Produk')">Produk</a>
                        <a class="nav-link" id="v-pills-order-tab" data-toggle="pill" href="#v-pills-order" role="tab" aria-controls="v-pills-order" aria-selected="false" onclick="changeCardHeader('Pemesanan')">Pemesanan</a>
                        <a class="nav-link" id="v-pills-myorder-tab" data-toggle="pill" href="#v-pills-myorder" role="tab" aria-controls="v-pills-myorder" aria-selected="false" onclick="changeCardHeader('Pesanan Saya')">Pesanan Saya</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white" id="account-card-header" style="font-size: 20px;"></div>

                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <hr style="margin-top: 0px;">
                            <h5 class="text-center">PERSONAL</h5>
                            <hr>
                            <form method="POST" action="{{ route('user.update', Auth::user()->id) }}">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
        
                                <div class="form-group row justify-content-center">
                                    <label for="fullname" class="col-md-4 col-form-label">{{ __('Nama Lengkap') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ Auth::user()->fullname }}" required disabled>
        
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row justify-content-center">
                                    <label for="name" class="col-md-4 col-form-label">{{ __('Jenis Kelamin') }}</label>
        
                                    <div class="col-md-6 form-inline">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender-men" value="L" @if (Auth::user()->gender == 'L')
                                                checked
                                            @endif disabled>
                                            <label class="form-check-label" for="gender-men">
                                                Laki - laki&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>
                                        </div>
    
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender-women" value="P" @if (Auth::user()->gender == 'P')
                                                checked
                                            @endif disabled>
                                            <label class="form-check-label" for="gender-women">
                                                Perempuan
                                            </label>
                                        </div>
        
                                        {{-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                </div>
    
                                <div class="form-group row justify-content-center">
                                    <label for="phone" class="col-md-4 col-form-label">{{ __('Nomor Telepon') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" required autocomplete="phone" disabled>
        
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <label for="whatsapp" class="col-md-4 col-form-label">{{ __('WhatsApp') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ Auth::user()->whatsapp }}" required autocomplete="whatsapp" disabled>
        
                                        @error('whatsapp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <label for="address" class="col-md-4 col-form-label">{{ __('Alamat') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" required autocomplete="address" disabled>
        
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <hr>
                                <h5 class="text-center">ACCOUNT</h5>
                                <hr>
        
                                <div class="form-group row justify-content-center">
                                    <label for="username" class="col-md-4 col-form-label">{{ __('Username') }}</label>
                                    
                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" required disabled>
                                    
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10 text-md-right">
                                        <button type="button" class="btn btn-primary" id="btn-edit-profile">
                                            {{ __('Edit') }}
                                        </button>
                                        <button type="submit" class="btn btn-success" id="btn-save-profile">
                                            {{ __('Simpan') }}
                                        </button>
                                        <button type="reset" class="btn btn-danger ml-1" id="btn-cancel-profile">
                                            {{ __('Batal') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel" aria-labelledby="v-pills-change-password-tab">
                            <form method="POST" action="{{ route('user.password') }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                @csrf
        
                                <div class="form-group row justify-content-center">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Password Baru') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Konfirmasi Password Baru') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
        
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10 text-md-right">
                                        <button type="submit" class="btn btn-success" id="btn-save-password">
                                            {{ __('Simpan') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                            <div class="text-right mb-3">
                                <a href="{{ route('product.show') }}" class="btn btn-sm btn-primary">
                                    <i class="small material-icons" style="font-weight:bold;">add</i>
                                    <span>Buat Produk</span>
                                </a>
                            </div>

                            {{-- <div class="container"> --}}
                                @if (count($products) > 0)
                                <table id="tableProduct" class="display">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Judul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-capitalize"><a class="text-dark" href="/product/{{$product->slug}}">{{$product->title}}</a></td>
                                            <td class="text-center">
                                                <a href="/edit/product/{{$product->id}}" class="btn btn-outline-primary p-3" style="width: 24px;height: 24px;position: relative"><i class="material-icons" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size: 16px;">edit</i></a>
                                                <a href="/delete/product/{{$product->id}}" class="btn btn-outline-danger p-3" style="width: 24px;height: 24px;position: relative"><i class="material-icons" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size: 16px;" onclick="event.preventDefault();document.getElementById('delete-product-{{$product->id}}').submit()">delete</i></a>
        
                                                <form id="delete-product-{{$product->id}}" action="{{ route('product.delete', $product->id) }}" method="POST" style="display: none;">
                                                    <input type="hidden" name="_method" value="delete">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>Tidak ada data</p>
                                @endif
                            </div>
                        {{-- </div> --}}
                        <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab">
                            <div class="container">
                                @if (count($orders) > 0)
                                    <table id="tableOrder" class="display">
                                        <thead>
                                            <tr>
                                                <th>No Order</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$order->no_order}}</td>
                                                <td>Rp {{$order->total_price}}</td>
                                                <td>{{$order->order_status}}</td>
                                                <td class="text-center">
                                                    <a href="/order/update/{{$order->no_order}}" class="btn btn-outline-primary p-3" style="width: 24px;height: 24px;position: relative"><i class="material-icons" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font-size: 16px;">edit</i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>Tidak ada data</p>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-myorder" role="tabpanel" aria-labelledby="v-pills-myorder-tab">
                            <div class="container">
                                @if (count($myOrders) > 0)
                                <table id="tableMyOrder" class="display">
                                    <thead>
                                        <tr>
                                            <th>No Order</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myOrders as $myOrder)
                                        <tr>
                                            <td>{{$myOrder->no_order}}</td>
                                            <td>Rp {{$myOrder->total_price}}</td>
                                            <td>{{$myOrder->order_status}}</td>
                                            <td class="text-center">
                                                <a href="/order/details/{{$myOrder->no_order}}" class="btn btn-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <p>Tidak ada data</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> {{-- end card --}}
        </div> {{-- end col-md-8 --}}
    </div>
    
</div>

<script>
    $(document).ready(function() {
        $('#tableProduct').DataTable();
        $('#tableOrder').DataTable();
        $('#tableMyOrder').DataTable();
        $('#btn-save-profile').hide();
        $('#btn-cancel-profile').hide();

        $('#btn-edit-profile').click(function() {
            $(this).hide();
            $('#btn-save-profile').show();
            $('#btn-cancel-profile').show();
            $('input').removeAttr('disabled');
        });

        $('#btn-cancel-profile').click(function() {
            $(this).hide();
            $('#btn-save-profile').hide();
            $('#btn-edit-profile').show();
            $('input').attr('disabled', true);
        });
    });

    $('#account-card-header').html($('.nav-link.active').html());

    function changeCardHeader(cardTitle) {
        $('#account-card-header').html(cardTitle);
    }
    
    
</script>
@endsection
