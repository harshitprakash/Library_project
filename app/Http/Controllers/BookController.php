<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Books;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $books=Books::all();
    return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('admin.book.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            // 'book_img' => 'required',
            // 'author_img' => 'required',
        ]);
        Books::create([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'book_img' => $request->book_img,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('index.book')->with('message','Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categories=Category::all();
        $book=Books::find($id);
        return view('admin.book.edit',compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        //
        $book = Books::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'author_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            // 'book_img' => 'required',
            // 'author_img' => 'required',
            'category_id' => 'required',
        ]);
        $book->update([
            'title' => $request->input('title'),
            'author_name' => $request->input('author_name'),
            'price' => $request->input('price') ?? $book->price,
            'quantity' => $request->input('quantity') ?? $book->quantity,
            'description' => $request->input('description'),
            'book_img' => $request->input('book_img'),
            'category_id' => $request->input('category_id')??$book->category_id, // Use the retrieved category ID
        ]);
        return redirect()->route('index.book')->with('message','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $books = Books::find($id);
        $books ->delete();
        return redirect()->back()->with('message','Book Delete successfully');

    }
}
