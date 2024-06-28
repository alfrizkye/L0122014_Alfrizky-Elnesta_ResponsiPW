<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-screen bg-transparent backdrop-blur-md px-16 py-2 h-24 flex items-center justify-between sticky top-0 z-10">
        <a href='/' class="font-bold text-4xl">WINKIKARAM</a>

        <div class="flex items-center gap-5">
            @guest
                <a href="/login" class="rounded-lg text-white px-4 py-2 text-lg font-medium bg-[tomato] duration-200 hover:bg-black">Login</a>
            @else
                <a href="{{route('books.index')}}" class="font-medium text-lg duration-200 hover:font-bold">Product</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="rounded-lg text-white px-4 py-2 text-lg font-medium bg-[tomato] duration-200 hover:bg-black">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</body>
</html>
