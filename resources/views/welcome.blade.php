<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WINKIKARAM - Best Bookstore in Town</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('navbar')

    <section class="">
        <div class="p-16 flex items-center justify-center gap-8 bg-[tomato] bg-opacity-10">
            <div class="flex flex-col">
                <h3 class="font-medium text-lg tracking-wider">WINKIKARAM BOOKSTORE</h3>
                <h1 class="font-bold text-6xl tracking wider">Featured Product of the <br> Month</h1>
                <button class="px-4 py-2 rounded-lg w-fit bg-[tomato] font-medium tracking-wide text-white mt-4 duration-200 hover:bg-black">See More</button>
            </div>
            <img src="{{ asset('storage/images/book-hero.png') }}" alt="hero" class="w-[40%]" />
        </div>

        <div class="grid grid-cols-3 gap-8 p-16">
            <div class="bg-blue-500 bg-opacity-10 rounded-lg p-8 flex justify-center gap-16">
                <div>
                    <h3 class="font-semibold text-3xl">Novel</h3>
                    <p class="font-medium text-lg">Fantasy Novel</p>
                    <p class="font-medium mt-5">Shop Now</p>
                </div>
                <img src="{{ asset('storage/images/novel.webp') }}" alt="item-1" class="h-40" />
            </div>

            <div class="bg-yellow-500 bg-opacity-10 rounded-lg p-8 flex justify-center gap-16">
                <div>
                    <h3 class="font-semibold text-3xl">Coloring</h3>
                    <p class="font-medium text-lg">for children</p>
                    <p class="font-medium mt-5">Shop Now</p>
                </div>
                <img src="{{ asset('storage/images/color-book.jpeg') }}" alt="item-1" class="h-40" />
            </div>

            <div class="bg-red-500 bg-opacity-10 rounded-lg p-8 flex justify-center gap-16">
                <div>
                    <h3 class="font-semibold text-3xl">History</h3>
                    <p class="font-medium text-lg">learn history</p>
                    <p class="font-medium mt-5">Shop Now</p>
                </div>
                <img src="{{ asset('storage/images/history.jpg') }}" alt="item-1" class="h-40" />
            </div>
        </div>
    </section>

</body>
</html>
