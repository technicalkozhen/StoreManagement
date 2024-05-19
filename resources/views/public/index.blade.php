@extends('layouts.public')

@section('content')
      
    <div class="flex justify-between relative">
        <div class="basis-5/12 grid grid-cols-3 gap-2 m-1 relative">
            @foreach ($product as $pro)
                <a class="max-h-48" href="{{route('addProductToTable',["id"=>$pro->id])}}">
                    <div class="h-48 w-36 text-center rounded-xl overflow-hidden relative">
                        <img src="{{asset('products/'.$pro->image.'')}}" class="h-48 object-cover w-full">
                        <div class="absolute top-0 left-0 h-full w-full bg-gradient-to-t from-black/75 to-transparent">
                            <div class="mt-32">
                                <p class="m-1 text-white text-right">{{$pro->name}}</p>
                                <p class="bg-yellow-300 rounded w-10/12 mx-auto">{{$pro->price}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="basis-6/12 m-1">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm rounded-2xl text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-2xl overflow-hidden">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-5 py-3">
                                ناوی مادە
                            </th>
                            <th scope="col" class="px-5 py-3">
                                کۆد
                            </th>
                            <th scope="col" class="px-5 py-3">
                                نرخ
                            </th>
                            <th scope="col" class="px-5 py-3">
                                
                            </th>
                            <th scope="col" class="px-5 py-3">
                                دانە
                            </th>
                            <th scope="col" class="px-5 py-3">
                                
                            </th>
                            <th scope="col" class="px-5 py-3">
                                کۆی گشتی
                            </th>
                            <th scope="col" class="px-5 py-3">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t_pro as $tab_pro)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tab_pro->name}}
                                </th>
                                <td class="px-5 py-4">
                                    {{$tab_pro->code}}
                                </td>
                                <td class="px-5 py-4">
                                    {{$tab_pro->price}}
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{route('increaceNumberQuantity',["id"=>$tab_pro->id])}}" class="bg-yellow-300 rounded p-2"><i class="fa-solid fa-plus"></i></a>
                                </td>
                                <td class="px-5 py-4">
                                    {{$tab_pro->quantity}}
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{route('decreaceNumberQuantity',["id"=>$tab_pro->id])}}" class="bg-yellow-300 rounded p-2"><i class="fa-solid fa-minus"></i></a>
                                </td>
                                <td class="px-5 py-4">
                                    {{$tab_pro->totalprice}}
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{route('deleteProductToTable',["id"=>$tab_pro->id])}}" class="bg-red-500 p-2 rounded text-white">سڕینەوە</a>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="absolute right-50 bottom-2 w-9/12 flex space-x-20 items-center space-x-2 rtl:space-x-reverse">
        <div class="flex w-4/12 justify-between">
            <a href="{{route('buyproduct',['state'=>1])}}" class="bg-green-500 text-white rounded-lg p-2 py-2 w-5/12 text-center font-bold">کڕین</a> 
            <a href="{{route('sellproduct',['state'=>0])}}" class="bg-green-500 text-white rounded-lg p-2 py-2 w-5/12 text-center font-bold">فرۆشتن</a> 
        </div>
        <div class="flex w-4/12">
            <p class="bg-yellow-300 rounded p-2">کۆی گشتی</p>
            <p class="border-2 flex items-center justify-center w-8/12">
                {{$total_price}}
            </p>   
        </div>
      </div>
@endsection