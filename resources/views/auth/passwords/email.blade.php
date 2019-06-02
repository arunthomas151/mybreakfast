{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">
<head>
    <title>Home</title>
    @include('Home.header')
    {{-- @yield('header') --}}
<!-- Site Title-->
</head>
<body>
  <!-- Page Header-->
  <header class="page-header page-header-secondary">
    @include('Home.forgetmenu')
  </header>
  <section class="section-sm bg-white">
        <div class="shell" data-photo-swipe-gallery="gallery">
          <h4 class="statedis">Forget Password</h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form2" method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <br>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __(' Registred E-Mail Address :') }}</label>

                                <input id="email" type="email" class="form-control2{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <br><br>
                                <button type="submit"  class="btn2">
                                    {{ __('submit') }}
                                </button>
                    </form>
                </div>
        </div>
  </section>
{{-- @endsection --}}
@include('Home.footer')
</body>
</html>
