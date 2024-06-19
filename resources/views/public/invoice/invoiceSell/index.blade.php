@extends('layouts.public')
@section('content')
<div class="relative mt-5">
    <a href="{{route('public')}}" class="bg-blue-300 p-1 pb-2 rounded">گەڕانەوە</a>
    <table class="w-10/12 mx-auto text-sm rtl:text-right text-gray-500 dark:text-gray-400 mt-10 shadow-xl rounded-2xl overflow-hidden">
        <thead class="text-xs text-center text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                     زمارەی پسوڵە
                </th>
                <th scope="col" class="px-6 py-3">
                    بەکارهێنەر
                </th>
                <th scope="col" class="px-6 py-3">
                    بەروار
                </th>
                <th scope="col" class="px-6 py-3 ">
                    بینینی بەرهەمەکان
                </th>
                <th scope="col" class="px-6 py-3 ">
                    کۆی گشتی
                </th>
                <th scope="col" class="px-6 py-3">
                    سڕینەوە
                </th>
               
        </thead>
        <tbody class="text-center">
            @foreach ($invoice as $invoices)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$invoices->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$invoices->users->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$invoices->created_at->format('Y-m-d')}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('invoiceSell.show',["invoiceSell"=>$invoices->id])}}"><i class="fa-solid fa-eye text-xl"></i></a>
                    </td>
                    <td class="px-6 py-4">
                    @foreach ($invoices->productinvoices as $prod_invoice)
                    @php
                        $totalprice = $totalprice + ($prod_invoice->price * $prod_invoice->quantity)   
                    @endphp
                     @endforeach
                     {{$totalprice}}
                     @php
                         $totalprice=0;
                     @endphp
                     
                    </td>
                    <td class="px-6 py-4">
                        <a href=""><i class="fa-solid fa-trash text-red-500 text-lg"></i></a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
{!! $invoice->links() !!}
@endsection