@extends('layouts.public')
@section('content')
<div class="relative mt-5">
    <a href="{{route('invoiceBuy.index')}}" class="bg-blue-300 p-1 pb-2 rounded">گەڕانەوە</a>
    <table class="w-10/12 mx-auto text-sm rtl:text-right text-gray-500 dark:text-gray-400 mt-10 shadow-xl rounded-2xl overflow-hidden">
        <thead class="text-xs text-center text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ناوی مادە
                </th>
                <th scope="col" class="px-6 py-3">
                    کۆد
                </th>
                <th scope="col" class="px-6 py-3">
                    نرخ
                </th>
                <th scope="col" class="px-6 py-3">
                    دانە
                </th>
                <th scope="col" class="px-6 py-3">
                    کۆی گشتی
                </th>
                <th scope="col" class="px-6 py-3">
                    کردارەکان
                </th>
               
        </thead>
        <tbody class="text-center">
            @foreach ($product as $pro)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pro->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$pro->code}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->price}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->quantity}}
                    </td>
                    <td class="px-6 py-4">
                        {{($pro->price * $pro->quantity)}}
                    </td>
                    
                    <td class="px-6 py-4">
                        <a href="{{route('invoiceBuy.edit',["invoiceBuy"=>$pro->id])}}"><i class="fa-solid fa-pen"></i></a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
{!! $product->links() !!}
@endsection