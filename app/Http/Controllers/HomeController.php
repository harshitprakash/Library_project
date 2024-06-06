<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function index()
    {
        $categories=Category::all();
        $books=Books::all();
        return view('home.index',compact('books','categories'));
    }
    public function borrow_book($id)
    {
        $data=Books::find($id);
        $book_id= $id;
        $quantity =$data->quantity;


        if($quantity >= 1)
        {
                if(Auth::id())
                {
                    $user_id=Auth::user()->id;
                    $borrow = new Borrow;

                    $borrow->book_id = $book_id;
                    $borrow->user_id = $user_id;
                    $borrow->status = 'Applied';

                    $borrow->save();
                    return redirect()->back()->with('message','Your request have been sent to admin');
                }
                else{
                    return redirect('login');
                }
        }
        else{
            return redirect()->back()->with('message','Not enough books available');
        }
    }
    public function book_history()
    {

        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $data = Borrow::where('user_id','=',$userid)->get();
            return view('home.book_history',compact('data'));

        }
    }
    public function request_cancel($id)
    {
        $request=Borrow::find($id);
        $request->delete();
        return redirect()->back()->with('message','Request cancled successfully');
    }

    public function home_explore()
    {   
        $categories=Category::all();
        $books=Books::all();
        return view('home.explore',compact('books','categories'));
    }

    public function book_search(Request $request)
    {
        $categories=Category::all();
        $search= $request->search;
        $books=Books::where('title','LIKE','%'.$search.'%')->orWhere('author_name','LIKE','%'.$search.'%')->get();
        return view('home.explore',compact('books','categories'));
    }

    public function cat_search($id)
    {   
        $categories=Category::all();
        $selectedCategory = Category::findOrFail($id);
        $books=Books::where('category_id',$id)->get();
        return view('home.explore',compact('books','categories','selectedCategory'));

    }

    public function book_details($id)
    {
            $book=Books::find($id);
            return view('home.book_details',compact('book'));

    }

}
