<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body dir="rtl" onload="datetime()">
    <div class="m-2">
        <p class="text-center font-bold ">بینینەوەی ڕاپۆرتی پسوڵەکان</p>
        <div class="flex items-center">
            <lable>بەروار:</lable>
            <label id=date></label>
        </div>
        <div class="flex items-center">
            <lable>کات:</lable>
            <label id=time></label>
        </div>
        <button onclick="printing()" id="btnprint" class="bg-green-600 text-white rounded-lg p-1 pb-2 w-12 mt-2">print</button>
    </div>

    <table class="w-10/12 mx-auto text-2sm rtl:text-right text-gray-500 dark:text-gray-400 mt-8 shadow-xl rounded-2xl overflow-hidden">
        <thead class="text-sm text-center text-white uppercase bg-green-600 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    زمارەی پسوڵە                
                </th>
                <th scope="col" class="px-6 py-3">
                     جۆری پسوڵە                
                </th>
                <th scope="col" class="px-6 py-3">
                    بەروار
                </th>
                <th scope="col" class="px-6 py-3 ">
                    کات
                </th>
                <th scope="col" class="px-6 py-3">
                    بەکارهێنەر
                </th>
                <th scope="col" class="px-6 py-3">
                    کۆی گشتی
                </th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($invoice as $invoices)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 py-4">
                        {{$invoices->id}}
                    </th>
                    <th class="px-6 py-4" id="state">
                        @if ($invoices->state==1)
                            {{"کڕین"}}
                        @else
                            {{"فرۆشتن"}}
                        @endif
                    </th>
                    <td class="px-6 py-4">
                        {{$invoices->created_at->format('Y-m-d')}}
                    </td>
                    <td class="px-6 py-4">
                        {{$invoices->created_at->diffForHumans()}}
                    </td>
                    <td class="px-6 py-4">
                        {{$invoices->users->name}}                   
                    </td>
                    <td>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        let date=new Date().toLocaleDateString();
        let time=new Date().toLocaleTimeString();

        function datetime(){
                document.getElementById('date').textContent=date;
                document.getElementById('time').textContent=time;

        };
        function printing(){
            document.getElementById('btnprint').classList.add('hidden');
            window.print();
            document.getElementById('btnprint').classList.remove('hidden');
        };
       
        
        
    </script>
</body>
</html>

