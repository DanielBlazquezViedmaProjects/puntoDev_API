<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller{

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $getAllBooks = Book::all();
        return response()->json($getAllBooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $newBook = new Book();
        $newBook->title = $request->title;
        $newBook->author = $request->author;
        $newBook->published_at = $request->published_at;
        $message = [
            'message'   =>  'New book added successfully',
            'book'      =>  $newBook,
        ];
        $newBook->save();
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book){
        if(!$book){

        }
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book){
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;
        $message = [
            'message'   =>  'Book updated successfully',
            'book'      =>  $book,
        ];
        $book->save();
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book){
        $book->delete();
        $message = [
            'message'   =>  'Book deleted successfully',
            'book'      =>  $book,
        ];
        return response()->json($message);
    }
}
