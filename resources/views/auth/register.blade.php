@extends('layouts.login&register')

@section('content')
<div class="m-h-72 p-2 w-5/12 mx-auto shadow mt-5 rounded" dir="rtl">
    <form action="{{route('register')}}" method="post" class="space-y-3">
        @csrf
        <div class="text-center ">
            <i class="fa-solid fa-store h-16 w-16 bg-green-600 rounded-full text-white text-3xl text-center p-2 pt-3"></i>
        </div>
        <div class="bg-gray-300 rounded-xl p-1">
            <div>
                <p class="mx-2">ناو</p>
                <input type="text" name="name" value="{{old('name')}}" class="bg-transparent focus:outline-none mx-2">
            </div>
            @error('name')
                <p class="text-red-400 text-sm mx-1">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        <div class="bg-gray-300 rounded-xl p-1">
            <div>
                <p class="mx-2">ئیمەیڵ</p>
                <input type="text" name="email" value="{{old('email')}}" placeholder="example@gmail.com" class="bg-transparent focus:outline-none mx-2">
            </div>
            @error('email')
                <p class="text-red-400 text-sm mx-1">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        <div class="bg-gray-300 rounded-xl p-1">
            <div>
                <p class="mx-2">وشەی نهێنی</p>
                <input type="password" name="password" placeholder="********" class="bg-transparent focus:outline-none mx-2">
            </div>
            @error('password')
                <p class="text-red-400 text-sm mx-1">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>
        <div class="bg-gray-300 rounded-xl p-1">
            <div>
                <p class="mx-2">دوبارەکردنەوەی وشەی نهێنی</p>
                <input type="password" name="password_confirmation" placeholder="********" class="bg-transparent focus:outline-none mx-2">
            </div>
        </div>
        <button class="text-white bg-green-600 rounded-xl p-2 font-bold mt-3 text-right">تۆماربوون</button> 
    </form>
    <div class="text-left m-2">
        <a href="{{route('login')}}" class="text-green-600 font-bold border-b-2 border-green-600 text-">چونەژوورەوە</a>
    </div>
    
</div>
@endsection
