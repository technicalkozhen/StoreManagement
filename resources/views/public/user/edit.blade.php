@extends('layouts.public')
@section('content')
<div class="mt-10">
    <a href="{{route('user.index')}}" class="rounded bg-blue-400 p-2 mr-28 text-white font-bold">گەڕانەوە</a>
</div>
<div class="rounded w-10/12 mx-auto shadow-lg mt-10">
    @if (session()->has('msg'))
        <p class="text-center bg-blue-300 text-white p-2 rounded w-5/12 mx-auto mb-5">{{session()->get('msg')}}</p>
    @endif
    <form action="{{route('user.update',['user'=>$user->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-3 gap-5 w-11/12 mx-auto p-2">
            <div>
                <p>ناو</p>
                <input type="text" name="name" class="bg-gray-200 rounded p-2" value="{{$user->name}}">
                @error('name')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
            <div>
                <p>ئیمەیڵ</p>
                <input type="text" name="email" class="bg-gray-200 rounded p-2" value="{{$user->email}}">
                @error('email')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
            <div>
                <p>وشەی نهێنی</p>
                <input type="password" name="password" class="bg-gray-200 rounded p-2">
                @error('password')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
            <div>
                <p>دوبارەکردنەوەی وشەی نهێنی</p>
                <input type="password" name="password_confirmation" class="bg-gray-200 rounded p-2">
            </div>
            <div>
                <p>ئەرک</p>
                <input type="text" name="role" class="bg-gray-200 rounded p-2" value="{{$user->role}}">
                @error('role')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
        </div>
        <button class="rounded bg-blue-400 p-2 mr-12 m-2 text-white font-bold">نوێ کردنەوە</button>
     </form>

     <form id="form_alert" action="{{route('user.destroy',['user'=>$user->id])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" onclick="alert()"  class="rounded bg-red-400 p-2 mr-12 m-2 text-white font-bold">سڕینەوە</button>
    </form>
</div>

<script>
    let alert=()=>{
    Swal.fire({
    title: 'دڵنیایت لە سڕینەوە ؟',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'بەڵێ',
    cancelButtonText: 'نەخێر'
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire(
        'سڕایەوە',
        'بەسەرکەوتووی سڕایەوە',
        'success'
        )

        document.getElementById('form_alert').submit();
    }
    })
            }
</script>
@endsection