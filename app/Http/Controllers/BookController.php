<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Books;
use Illuminate\support\Facades\File;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $books=Books::paginate(6);
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
            'title' => 'required|unique:books,title',
            'author_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'book_img' => 'nullable|mimes:png,jpg,jpeg,webp',
            'author_img' => 'nullable|mimes:png,jpg,jpeg',
        ]);
       
        if($request->hasFile('book_img')){
            $bookpath = 'admin/img/book_image/';
            if (!is_dir($bookpath)) 
            {
                mkdir($bookpath, 0777, true);
            }
            $file = $request->file('book_img');
            $extention =$file->getClientOriginalExtension();

            $bookfilename= time().'.'.$extention;

            $file->move($bookpath,$bookfilename);
        }
        if($request->hasFile('author_img')){
            $authorpath = 'admin/img/author_img/';
            if (!is_dir($authorpath)) 
            {
                mkdir($authorpath, 0777, true);
            }
            $file = $request->file('author_img');
            $extention =$file->getClientOriginalExtension();

            $authorfilename= time().'.'.$extention;

            $file->move($authorpath,$authorfilename);
        }
        Books::create([
            'title' => $request->title,
            'author_name' => $request->author_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'book_img' => $bookpath.$bookfilename,
            'author_img' => $authorpath.$authorfilename,
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
            'book_img' => 'nullable|mimes:png,jpg,jpeg',
            'author_img' => 'nullable|mimes:png,jpg,jpeg',
            'category_id' => 'required',
        ]);

        if($request->hasFile('book_img')){
            $bookpath = 'admin/img/book_image/';
            if (!is_dir($bookpath)) 
            {
                mkdir($bookpath, 0777, true);
            }
            $file = $request->file('book_img');
            $extention =$file->getClientOriginalExtension();

            $bookfilename= time().'.'.$extention;

            $file->move($bookpath,$bookfilename);
            if(File::exists($book->book_img)){
                File::delete($book->book_img);
            }
        }
        if($request->hasFile('author_img')){
            $authorpath = 'admin/img/author_img/';
            if (!is_dir($authorpath)) 
            {
                mkdir($authorpath, 0777, true);
            }
            $file = $request->file('author_img');
            $extention =$file->getClientOriginalExtension();

            $authorfilename= time().'.'.$extention;

            $file->move($authorpath,$authorfilename);

            if(File::exists($book->author_img)){
                File::delete($book->author_img);
            }
        }

        $book->update([
            'title' => $request->input('title'),
            'author_name' => $request->input('author_name'),
            'price' => $request->input('price') ?? $book->price,
            'quantity' => $request->input('quantity') ?? $book->quantity,
            'description' => $request->input('description'),
            'book_img' => $bookpath . $bookfilename ?? $book->book_img,
            'author_img' => $authorpath . $authorfilename ?? $book->author_img,
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
         // Retrieve the book by ID
    $book = Books::find($id);

    // Check if the book exists
    if ($book) {
        // Check if the author's image file exists and delete it
        if (File::exists(public_path($book->author_img))) {
            File::delete(public_path($book->author_img));
        }
        if (File::exists(public_path($book->book_img))) {
            File::delete(public_path($book->book_img));
        }

        // Delete the book record from the database
        $book->delete();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Book deleted successfully');
    } else {
        // If the book was not found, redirect back with an error message
        return redirect()->back()->with('error', 'Book not found');
    }
    }
}
