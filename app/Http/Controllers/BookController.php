<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Http\Resources\BookCollection;
use Illuminate\Http\Request;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allBooks()
    {
        return BookCollection::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addBook(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ISBN'=>'required',
            'title'=>'required',
            'author'=>'required',
            'description'=>'required',
            'price'=>'required',
            'year'=>'required',
            'category'=>'required'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }

        Book::create([
            'ISBN'=>request('ISBN'),
            'title'=>request('title'),
            'category_id'=>request('category'),
            'author'=>request('author'),
            'description'=>request('description'),
            'price'=>request('price'),
            'year'=>request('year')
        ]);

        return response()
            ->json(['success'=>'Book added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function showById(Book $book, $id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return response()
            ->json(['message'=>'Book updated']);
    }

}
