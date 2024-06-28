<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku</title>
</head>
<body>
    @include('navbar')

    <section class="p-10 flex items-center justify-center h-screen">
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg border w-[50%] p-8">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required class="mt-1 block w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required class="mt-1 block w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5" required class="resize-none mt-1 block w-full p-2 border rounded-md">{{ old('description', $book->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}" required class="mt-1 block w-full p-2 border rounded-md">
            </div>
            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="img" id="img" accept="image/jpeg, image/jpg, image/png" class="mt-1 block w-full p-2 border rounded-md">
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </section>
</body>
</html>
