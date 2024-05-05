<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fastfood</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body dir="rtl">
    <div class="flex items-center justify-between bg-blue-300 p-3">
        <div class="space-x-5 rtl:space-x-reverse flex items-center justify-center">
            <a href="{{route('')}}" class="bg-white p-1 rounded pb-2">تۆمارکردن</a>
            <a href="">چاپکردن</a>
            <a href="{{route('')}}">پسوڵەکان</a>
            <a href="{{route('')}}">ڕاپۆرتی ئەمڕۆ</a>
            <a href="{{route('')}}">لیستی موادەکان</a>
            <a href="">باقی دانەوە</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button>logout</button>
            </form>
        </div>
        <div>
            <i class="fa-solid fa-user text-xl"></i>
        </div>
      </div>
      <main class="mt-5">
          @yield('content')
      </main>
</body>
</html>