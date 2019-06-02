{{-- @extends('layouts.app')

@section('content') --}}
<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">
<head>
    <title>Home</title>
    @include('Home.header')
    {{-- @yield('header') --}}
<!-- Site Title-->
</head>
<body>
    <div>
  <!-- Page Header-->
  <header class="page-header page-header-secondary">
    @include('Home.forgetmenu')
</header>
</div>
<section class="section-sm bg-white">
        <div class="shell" data-photo-swipe-gallery="gallery">
          <h4 class="statedis">Password Reset</h4>
            <br>
                <div class="card-body">
                    <form class="form2" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Registred E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-xs-6 col-ls-8 offset-xs-4">
                                <button type="submit" class="btn2">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
</section>
{{-- @endsection --}}
@include('Home.footer')
</body>
</html>
