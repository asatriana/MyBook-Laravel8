<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all(); //Fungsi untuk mengambil seluruh data pada tabel books

        return view('books.index', compact('books')); //Redirect ke halaman books/index.blade.php dengan membawa data books tadi
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create'); //Redirect ke halaman books/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', //nama form "title" harus diisi (required)
            'writer' => 'required', //nama form "writer" harus diisi (required)
            'publisher' => 'required', //nama form "publisher" harus diisi (required)
        ]); //Memvalidasi inputan yang kita kirim apakah sudah benar

        Book::create($request->all()); //Fungsi untuk menyimpan data inputan kita

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.'); //Redirect ke halaman books/index.blade.php dengan pesan succes
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.detail', compact('book')); //Redirect ke halaman books/detail.blade.php dengan membawa data book sesuai ID yang dipilih
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book')); //Redirect ke halaman books/edit.blade.php dengan membawa data book sesuai ID yang dipilih
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required', //nama form "title" harus diisi (required)
            'writer' => 'required', //nama form "writer" harus diisi (required)
            'publisher' => 'required', //nama form "publisher" harus diisi (required)
        ]); //Memvalidasi inputan yang kita kirim apakah sudah benar

        $book->update($request->all()); //Fungsi untuk mengupdate data inputan kita

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {       
        $book->delete(); //Fungsi untuk menghapus data sesuai dengan ID yang dipilih

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully'); //Redirect ke halaman books/index.blade.php dengan pesan success
    }

    public function export() 
    {
        //return Excel::download(new BooksExport, 'books.xlsx');

        // $export = new BooksExport([
            // [1, 2, 3],
            // [4, 5, 6]
        // ]);
    
        // return Excel::download($export, 'invoices.xlsx');
        return (new BooksExport)->download('invoices.xlsx');
    }
}
