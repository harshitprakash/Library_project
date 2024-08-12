<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Books;
use App\Models\Borrow;

class AdminController extends Controller
{
    
    public function index()
    {
        if(Auth::id())
        {
            $usertype= Auth()->user()->usertype;
            
            if($usertype == 'admin')
            {
                $categories=Category::count();
                $users=User::where('usertype','user')->count();
                $books=Books::count();
                $book_app=borrow::where('status','Approved')->count();
                $book_applied=borrow::where('status','Applied')->count();
                $book_returned=borrow::where('status','Returned')->count();
                return view('admin.home',compact('categories','users','books','book_app','book_applied','book_returned'));
            }
            elseif($usertype == 'user')
            {
                
                $books=Books::all();
                return view('home.index',compact('books'));
            }

        }
        else
        {
            return redirect()->back();
        }

    }

    public function category_page()
    {
            $categories=Category::paginate(10);
            return view('admin.category',compact('categories'));
    }

    public function category_create(Request $request)
    {
       $request->validate([
        'cat_title' => 'required|unique:categories,cat_title',
       ]);
       Category::create($request->all());
       return redirect()->route('index')->with('message','Category Added successfully.');
    }

    public function category_edit($id)
    {
            $category= Category::find($id);
            return view('admin.update',compact('category'));
    }

    public function category_update(Request $request,$id)
    {
            $request->validate([
                'cat_title' => 'required',
            ]);
            $category = Category::find($id);
            $category->update($request->all());
            return redirect()->route('index')
              ->with('message', 'Category updated successfully.');
    }

    public function category_delete($id)
    {
      
        $category = Category::find($id);
        $category ->delete();
        return redirect()->back()->with('message','Category Delete successfully');

    }
    

}
