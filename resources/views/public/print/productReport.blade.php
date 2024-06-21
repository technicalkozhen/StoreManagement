<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body dir="rtl" onload="datetime()">
    <div class="m-2">
        <p class="text-center font-bold ">بینینەوەی ڕاپۆرتی بەرهەمی دیاری کراوی کۆگا</p>
        <div class="flex items-center">
            <lable>بەروار:</lable>
            <label id=date></label>
        </div>
        <div class="flex items-center">
            <lable>کات:</lable>
            <label id=time></label>
        </div>
        <form action="{{route('productReport')}}" method="get">
            <div id="search" class="absolute left-1/2 top-12 rounded-xl space-y-2 transform -translate-x-1/2 w-4/12 bg-gray-200/70 p-2">
                <div class="flex items-center justify-between">
                    <button>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <input type="text" name="search" value="{{request('search')}}" id="valueSearch" onkeyup="searching()" class="rounded-xl w-full bg-transparent mx-1 px-1 focus:outline-none ">
                    <button id="mark" class="hidden" onclick="clean()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        </form>
        @if (request('search'))
            <p id="textSearch" class="mt-3 text-gray-400 text-center">ئەنجامی گەڕان بۆ "{{request('search')}}"</p>
        @endif
        <button onclick="printing()" id="btnprint" class="bg-green-600 text-white rounded-lg p-1 pb-2 w-12 mt-2">print</button>
    </div>

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
                <th scope="col" class="px-6 py-3 ">
                    وێنە
                </th>
        </thead>
        <tbody class="text-center">
            @foreach ($product->get() as $pro)
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
                        <div class="flex items-center justify-center">
                            <img src="{{asset('products/'.$pro->image.'')}}" class="rounded h-12 w-12">
                        </div>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
    <script>
        let date = new Date().toLocaleDateString();
        let time = new Date().toLocaleTimeString();

        function datetime(){
                document.getElementById('date').textContent = date;
                document.getElementById('time').textContent = time;
        };
        function printing(){
            document.getElementById('btnprint').classList.add('hidden');
            document.getElementById('search').classList.add('hidden');
            document.getElementById('textSearch').classList.add('hidden');
            window.print();
            document.getElementById('btnprint').classList.remove('hidden');
            document.getElementById('search').classList.remove('hidden');
            document.getElementById('textSearch').classList.remove('hidden');

        };
        function searching(){
            let val = document.getElementById('valueSearch').value;
            if(val == ""){
                document.getElementById('mark').classList.add('hidden');
            }else{
                document.getElementById('mark').classList.remove('hidden');
            }
        };
        function clean(){
            document.getElementById('valueSearch').value = "";
            document.getElementById('mark').classList.add('hidden');
        };
       
    </script>
</body>
</html>

