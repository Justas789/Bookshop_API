<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('books')
            ->select('*')
            ->join('categories','categories.id','=','books.category_id')
            ->get();
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }

        Category::create([
            'title'=>request('title')
        ]);

        return response()
            ->json(['success'=>'Category added successfully']);

    }

}
