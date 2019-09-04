@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white font-weight-bold text-uppercase" style="letter-spacing: 4px;">{{ __('Register') }}</div>

                <div class="card-body">
                    {{-- <div class="text-center mb-3" id="choose-user-status">
                        <h5 class="my-4">Pilih salah satu yang mendeskripsikan diri Anda</h5>
                        <div class="w-100 text-center">
                            <div class="d-inline mr-2">
                                <button type="button" class="btn btn-lg btn-outline-success" id="btn-reg-p" style="width: 120px;">Produsen</button>
                            </div>
                            <div class="d-inline ml-2">
                                <button type="button" class="btn btn-lg btn-outline-primary" id="btn-reg-k" style="width: 120px;">Konsumen</button>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div id="form-register">
                        <a class="text-primary" style="cursor: pointer;" id="back">&LeftArrow; Kembali</a> --}}
                        <form method="POST" action="{{ route('register') }}" id="form-register" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
    
                                <div class="col-md-6">
                                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autofocus>
    
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
    
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-men" value="L" checked>
                                        <label class="form-check-label" for="gender-men">
                                            Laki - laki
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-women" value="P">
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

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="whatsapp" class="col-md-4 col-form-label text-md-right">{{ __('WhatsApp') }}</label>
    
                                <div class="col-md-6">
                                    <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp" autofocus>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="sameWithPhone">
                                        <label class="form-check-label" for="sameWithPhone">sama dengan Nomor Telepon</label>
                                    </div>
    
                                    @error('whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
    
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>
    
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                                
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Foto Profil') }}</label>
    
                                <div class="col-md-6">
                                    <input id="avatar" type="file" name="avatar" value="{{ old('avatar') }}">
                                </div>
                            </div>

                            {{-- <hr>

                            <div class="form-group row">
                                <label for="userstatus" class="col-md-4 col-form-label text-md-right">{{ __('Pilih profesi Anda') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="userstatus">
                                        <option value="P">Produsen</option>
                                        <option value="K">Konsumen</option>
                                    </select>
                                </div>
                            </div> --}}
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#sameWithPhone').on('click', function() {
            if($(this).is(':checked')) {
                $('#whatsapp').val($('#phone').val());
            } else {
                $('#whatsapp').val('');
            }
        });
    });
</script>
@endsection
