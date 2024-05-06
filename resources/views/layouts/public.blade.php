<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fastfood</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body dir="rtl" class="bg-gray-100">
    <div class="flex items-center justify-between p-1 px-2 border-b-2">
        <div class="basis-2/12 flex items-center justify-between">
            <a href="">
                <div class="flex items-center justify-center space-x-2 rtl:space-x-reverse">
                    <i class="fa-solid fa-store h-9 w-9 bg-green-600 rounded-full text-white text-lg p-2"></i>
                    <p class="font-bold">کۆگا</p>
                </div>
            </a>
        </div>
        <div class="basis-2/12 space-x-4 rtl:space-x-reverse text-xl flex items-center justify-end mx-2 relative">
            <div onclick="showModalUser()" class="flex items-center justify-center cursor-pointer  space-x-2 rtl:space-x-reverse relative">
                <p>{{auth()->user()->name}}</p>
                <i class="fa-solid fa-user text-2xl"></i>
                <div id="modal" class="absolute top-10 p-1 z-1 min-w-full text-center bg-green-600 text-white rounded shadow hidden">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="text-sm">چونەدەرەوە</button>
                    </form>
                    <a class="text-sm" href="">پڕۆفایل</a>
                </div>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="basis-2/12 border-l-2 bg-gray-400 p-3 text-white">
            <div class="mb-3">
                <i class="fa-solid fa-bars"></i>
                <a href="" class="font-bold p-2 text-white">داشبۆرد</a>
            </div>
            <div class="mb-3">
                <i class="fa-solid fa-house"></i>
                <a href="" class="font-bold p-2 text-white">سەرەکی</a>
            </div>
            <div class="mb-3">
                <i class="fa-solid fa-user"></i>
                <a href="" class="font-bold p-2 text-white">بەکارهێنەرەکان</a>
            </div>
            <div class="mb-2">
                <i class="fa-solid fa-pen-to-square"></i>
                <a href="{{route('product.index')}}" class="font-bold p-2 text-white">کاڵاکان</a>
            </div>
            <div class="relative">
                <div onclick="showMenuInvoice()" class="flex items-center cursor-pointer">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <p href="" class="font-bold p-2">پسوڵەکان</p>
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div id="invoice" class="absolute top-8 p-1 z-1 hidden bg-red-200">
                    <div>
                        <a class="text-sm" href="">- پسوڵەی کڕین </a>
                    </div>
                    <div>
                        <a class="text-sm" href="">- پسوڵەی فرۆشتن</a>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div onclick="showMenuReport()" class="flex items-center cursor-pointer">
                    <i class="fa-solid fa-file-invoice"></i>
                    <p href="" class="font-bold p-2">راپۆرتەکان</p>
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div id="report" class="absolute top-8 p-1 z-1 hidden">
                    <div>
                        <a class="text-sm" href="">- خەرجی</a>
                    </div>
                    <div>
                        <a class="text-sm" href="">- کۆی خەرجی</a>
                    </div>
                    <div>
                        <a class="text-sm" href="">- پسوڵەکان</a>
                    </div>
                    <div>
                        <a class="text-sm" href="">- کاڵاکان</a>
                    </div>
                    <div>
                        <a class="text-sm" href="">- چالاکی سیستەم</a>
                    </div>
                </div>
            </div>
           
           
        </div>
        <div class="basis-10/12 overflow-y-scroll h-[600px]">
            @yield('content')
        </div>
    </div>
</body>

<script>
   
    let showModalUser=()=>{
        let show=document.getElementById('modal').classList.toggle('hidden');
    }
    let showMenuInvoice=()=>{
        let show=document.getElementById('invoice').classList.toggle('hidden');
    }
    let showMenuReport=()=>{
        let show=document.getElementById('report').classList.toggle('hidden');
    }


</script>
</html>