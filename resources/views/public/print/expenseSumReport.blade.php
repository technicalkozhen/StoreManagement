<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body dir="rtl" onload="datetime()" class="h-[297] w-[210]">
    <div class="m-2">
        <div class="text-center">
            <p class="font-bold mb-2">بینینەوەی ڕاپۆرتی کۆی خەرجی کۆگا</p>
            <div class="relative">
                <button id="btnExpense" onclick="expenseSum()" class="bg-green-600 p-1 pb-2 rounded text-white">کۆی خەرجی</button>
                <label id="priceExpense" class="hidden bg-yellow-400 rounded p-1 pb-2">{{$prices}}</label>
                <div id="modal" class="absolute left-1/2 top-12 hidden rounded space-y-2 transform -translate-x-1/2 w-4/12 bg-gray-300/70 p-2">
                    <div class="flex items-center justify-between px-2">
                        <p>زیادکردنی تێبینی بۆ ڕاپۆرتەکە</p>
                        <button>
                            <i onclick="hideMark()" class="fa-solid fa-xmark text-left"></i>
                        </button>
                    </div>
                    <div class="flex items-center justify-between">
                        <input type="text" id="valueNote" maxlength="45" class="rounded w-10/12 p-2 w-10/12 focus:outline-none">
                        <button class="bg-green-600 p-1 pb-2 rounded text-white" onclick="addNote()">زیادکردن</button>
                    </div>
                </div>
                <div id="note" class="absolute left-1/2 top-12 overflow-hidden hidden rounded space-y-2 transform -translate-x-1/2 h-16 w-5/12 bg-gray-200/70 p-1 هۆ">
                    <h1 class="font-bold">تێبینی</h1>
                    <h1 id="h1" class="text-right"></h1>
                </div>
            </div>
        </div>
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

    <table class="w-10/12 mx-auto text-2sm rtl:text-right text-gray-500 dark:text-gray-400 mt-10 shadow-xl rounded-2xl overflow-hidden">
        <thead class="text-sm text-center text-white uppercase bg-green-600 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    تایتڵ                
                </th>
                <th scope="col" class="px-6 py-3">
                    نرخ
                </th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($data as $expenses)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 py-4">
                        {{$expenses->title}}
                    </th>
                    <td class="px-6 py-4">
                        {{$expenses->price}}
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
            document.getElementById('modal').classList.add('hidden');
            window.print();
            document.getElementById('btnprint').classList.remove('hidden');
        };
        function expenseSum(){
            document.getElementById('priceExpense').classList.remove('hidden');
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('note').classList.add('hidden');

        };

        function hideMark(){
            document.getElementById('modal').classList.add('hidden');
        };
        
        function addNote(){
            let value=document.getElementById('valueNote').value;
            document.getElementById('h1').textContent=value;
            if(value==''){
                document.getElementById('note').classList.add('hidden');
            }else{
                document.getElementById('note').classList.remove('hidden');
            }
            document.getElementById('modal').classList.add('hidden');

        };
       
    </script>
</body>
</html>

