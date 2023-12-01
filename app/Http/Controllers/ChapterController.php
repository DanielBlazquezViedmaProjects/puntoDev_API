<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Book $book){
        $chapters = $book->chapters;
        return response()->json($chapters);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book){
        $newChapter = new Chapter();
        $newChapter->number_chapter = $request->number_chapter;
        $newChapter->title= $request->title;
        $newChapter->resume = $request->resume;
        $book->chapter()->save($newChapter);
        $message = [
                'message'=>'You have created a new chapter successfully',
                'book'=>$book,
                'chapter'=>$newChapter
        ];
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter){
        if(empty($chapter)){
            return "Chapter don't found";
        }else{
            return response()->json($chapter);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter, Book $book){
        $chapter->number_chapter = $request->number_chapter;
        $chapter->title= $request->title;
        $chapter->resume = $request->resume;
        $book->chapters()->save($chapter);
        $message = [
            'message'=>'Chapter updated successfully',
            'book'=>$book,
            'chapter'=>$chapter
        ];
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book, Chapter $chapter){
        $chapter->delete();
        $message = [
            'message'=>'Chapter deleted successfully',
            'book'=>$book,
            'chapter'=>$chapter
        ];
        return response()->json($message);
    }
}
