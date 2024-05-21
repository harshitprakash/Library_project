<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Books;

class AdminController extends Controller
{
    
    public function index()
    {
        if(Auth::id())
        {
            $usertype= Auth()->user()->usertype;
            
            if($usertype == 'admin')
            {   
                
                return view('admin.index');
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
            $categories=Category::all();
            return view('admin.category',compact('categories'));
    }

    public function category_create(Request $request)
    {
       $request->validate([
        'cat_title' => 'required',
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
