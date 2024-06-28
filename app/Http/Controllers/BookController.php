<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $books = Book::latest()->paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $img = $request->file('img');
        $img->storeAs('public/books', $img->hashName());

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $img->hashName()
        ]);

        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //get product by ID
        $book = Book::findOrFail($id);

        //render view with product
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'img' => 'img|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'author' => 'required'
        ]);

        //get product by ID
        $book = Book::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('img')) {

            //upload new image
            $img = $request->file('img');
            $img->storeAs('public/images', $img->hashName());

            //delete old image
            Storage::delete('public/images/'.$book->img);

            //update product with new image
            $book->update([
                'img' => $img->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'author' => $request->author
            ]);

        } else {

            //update product without image
            $book->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'author' => $request->author
            ]);
        }

        //redirect to index
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $book = Book::findOrFail($id);

        //delete image
        Storage::delete('public/images/'. $book->img);

        //delete product
        $book->delete();

        //redirect to index
        return redirect()->route('books.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
