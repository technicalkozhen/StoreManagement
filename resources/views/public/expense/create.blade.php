@extends('layouts.public')

@section('content')

<div class="mt-10">
    <a href="{{route('expense.index')}}" class="rounded bg-blue-400 p-2 mr-28 text-white font-bold">گەڕانەوە</a>
</div>
<div class="rounded w-10/12 mx-auto shadow-lg mt-10">
    @if (session()->has('msg'))
        <p class="text-center bg-blue-300 text-white p-2 rounded w-5/12 mx-auto mb-5">{{session()->get('msg')}}</p>
    @endif
    <form action="{{route('expense.store')}}" method="post">
        @csrf
        <div class="grid grid-cols-3 gap-5 w-11/12 mx-auto p-2">
            <div>
                <p>تایتڵ</p>
                <input type="text" name="title" class="bg-gray-200 rounded p-2">
                @error('title')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
            <div>
                <p>نرخ</p>
                <input type="text" name="price" class="bg-gray-200 rounded p-2">
                @error('price')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
            <div>
                <p>باسکردن</p>
                <input type="text" name="description" class="bg-gray-200 rounded p-2">
                @error('description')
                    <p class="text-red-500 mt-2">
                        {{ $message }} 
                    </p>
                @enderror
            </div>
        </div>
        <button class="rounded bg-blue-400 p-2 mr-12 m-2 text-white font-bold">زیادکردن</button>
    </form>
</div>
@endsection