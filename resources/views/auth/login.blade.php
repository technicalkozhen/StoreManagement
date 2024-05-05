@extends('layouts.login&register')

@section('content')

<div class="m-h-72 p-2 w-5/12 mx-auto shadow mt-5 rounded" dir="rtl">
    <form action="{{route('login')}}" method="post" class="space-y-3">
        @csrf
        <div class="text-center ">
            <i class="fa-solid fa-store h-16 w-16 bg-green-600 rounded-full text-white text-3xl text-center p-2 pt-3"></i>
        </div>
        <div class="bg-gray-300 rounded-xl p-1">
            <p class="mx-2">ئیمەیڵ</p>
            <input type="text" value="{{old('email')}}" name="email" placeholder="example@gmail.com" class="bg-transparent focus:outline-none mx-2">
        </div>
        @error('email')
            <p class="text-red-400 text-sm mx-1">
                <strong>{{ $message }}</strong>
            </p>
        @enderror
        <div class="bg-gray-300 rounded-xl p-1">
            <p class="mx-2">وشەی نهێنی</p>
            <input type="password" name="password" placeholder="********" class="bg-transparent focus:outline-none mx-2">
        </div>
        @error('password')
            <p class="text-red-400 text-sm mx-1">
                <strong>{{ $message }}</strong>
            </p>
        @enderror
        <button class="text-white bg-green-600 rounded-xl p-2 font-bold mt-3 text-right">چونەژوورەوە</button> 
    </form>
    <div class="text-left m-2">
        <a href="{{route('register')}}" class="text-green-600 font-bold border-b-2 border-green-600 text-">تۆماربوون</a>
    </div>
    
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
