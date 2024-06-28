<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Produk</title>
</head>
<body>
    @include('navbar')

    <section class="p-10">
        <a href="{{route('books.create')}}" class="my-8 px-4 py-2 font-semibold text-lg rounded-lg bg-[tomato] text-white duration-200 hover:bg-black">
            Tambah Buku
        </a>
        <div class="grid grid-cols-4 gap-5 mt-8">
            @forelse ($books as $book)
                <div class="bg-white rounded-lg border shadow-md flex flex-col justify-between pb-6">
                    <div class="flex items-center justify-center py-3">
                        <img src="{{ asset('/storage/books/'.$book->img) }}" alt="foto-produk" class="w-[40%] rounded-lg" />
                    </div>

                    <div class="px-6 py-2">
                        <h1 class="font-bold text-center"> {{$book->title}} </h1>
                        <p class="font-medium text-gray-400 text-[14px]"> {{$book->author}} </p>
                        <p class="text-gray-400 text-[14px] text-justify"> {{$book->description}} </p>
                    </div>

                    <div class="px-6 flex items-center justify-between">
                        <h1 class="font-bold text-lg"> {{$book->price}} </h1>

                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex items-center gap-2">
                            <a href="{{ route('books.edit', $book->id) }}" class="duration-200 hover:fill-green-500">
                                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" width='26' height='26' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.75c0-.414.336-.75.75-.75s.75.336.75.75v9.25c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm-2.011 6.526c-1.045 3.003-1.238 3.45-1.238 3.84 0 .441.385.626.627.626.272 0 1.108-.301 3.829-1.249zm.888-.889 3.22 3.22 8.408-8.4c.163-.163.245-.377.245-.592 0-.213-.082-.427-.245-.591-.58-.578-1.458-1.457-2.039-2.036-.163-.163-.377-.245-.591-.245-.213 0-.428.082-.592.245z" fill-rule="nonzero"/></svg>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="duration-200 hover:fill-red-500">
                                <svg width='24' height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M19 24h-14c-1.104 0-2-.896-2-2v-16h18v16c0 1.104-.896 2-2 2m-9-14c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6-5h-20v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2zm-12-2h4v-1h-4v1z"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
