<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

// Route::get('/', function () {
//     return view('book', ['books' => Book::with('reviews')->take(5)->get()]);
// });

// Route::get('/book/{book}', function(Book $book){

//     return view('book.show', ['book' => $book]);

// });


Route::get('/', fn()=> to_route('book.index'));
Route::resource('book', BookController::class);


