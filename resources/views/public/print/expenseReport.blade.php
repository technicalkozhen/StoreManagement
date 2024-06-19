<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body dir="rtl" onload="datetime()">
    <div class="m-2">
        <p class="text-center font-bold ">بینینەوەی وردەکاری ڕاپۆرتی خەرجی کۆگا</p>
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
                    تایتڵ                
                </th>
                <th scope="col" class="px-6 py-3">
                    نرخ
                </th>
                <th scope="col" class="px-6 py-3">
                    باسکردن
                </th>
                <th scope="col" class="px-6 py-3 ">
                    بەروار
                </th>
                <th scope="col" class="px-6 py-3">
                    کات
                </th>
                <th scope="col" class="px-6 py-3">
                    بەکارهێنەر
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
                    <td class="px-6 py-4">
                        {{$expenses->description}}
                    </td>
                    <td>
                        {{$expenses->created_at->format('Y-m-d')}}
                    </td>
                    <td>
                        {{$expenses->created_at->diffForHumans()}}
                    </td>
                    <td>
                        {{$expenses->users->name}}
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

