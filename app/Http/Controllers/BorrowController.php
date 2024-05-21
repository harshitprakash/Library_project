<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Books;



class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Borrow::all();
        return view('admin.borrow_request',compact('data'));
    }

    public function approve_book($id)
    {
        // Find the borrow record by ID
    $borrow = Borrow::find($id);
    $status=$borrow->status;

        if($status =='Approved')
        {
                return redirect()->back()->with('message','Allready approved');
        }
        elseif($status == 'Applied')
        {
                      // Handle case where the borrow record is not found
                      if (!$borrow) 
                      {
                          return redirect()->back()->with('error', 'Borrow record not found.');
                      }
          
                              // Update the status to 'Approved'
                          $borrow->status = 'Approved';
                          $borrow->save();
          
                          // Find the related book by book ID
                          $book = Books::find($borrow->book_id);
          
                      // Handle case where the related book is not found
                      if (!$book)
                      {
                              return redirect()->back()->with('error', 'Book not found.');
                      }
          
                      // Decrement the book quantity by 1
                      if ($book->quantity > 0)
                      {
                      $book->quantity -= 1;
                      $book->save();
                      } 
          
                      else 
                      {
                      return redirect()->back()->with('message', 'Not enough book.');
                      }
          
                      return redirect()->back()->with('message', 'Book borrowing request approved successfully.');
                
        }
        else
        {
            return redirect()->back()->with('message','The Book is not Applied');
        }
   
    }


    public function returned_book($id)
    {
        // Find the borrow record by ID
        $borrow = Borrow::find($id);
        $status=$borrow->status;

        if($status =='Returned')
        {
                return redirect()->back()->with('message','Allready Returned');
        }

        elseif($status == 'Approved')
        {
                
                     // Handle case where the borrow record is not found
            if (!$borrow) 
            {
                return redirect()->back()->with('error', 'Borrow record not found.');
            }

                    // Update the status to 'Approved'
                $borrow->status = 'Returned';
                $borrow->save();

                // Find the related book by book ID
                $book = Books::find($borrow->book_id);

            // Handle case where the related book is not found
            if (!$book)
            {
                    return redirect()->back()->with('error', 'Book not found.');
            }

            // Decrement the book quantity by 1
            if ($book->quantity >= 0)
            {
            $book->quantity += 1;
            $book->save();
            } 

            else 
            {
            return redirect()->back()->with('message', 'Not enough book.');
            }

            return redirect()->back()->with('success', 'Book borrowing request approved successfully.');
      
        }

        else
        {
            return redirect()->back()->with('message','The Book is not Approved');
        }
   
    }

    public  function rejected_book($id)
    {
        
        $borrow = Borrow::find($id);
        if($borrow->status == 'Applied')
        {
            $borrow->status ='Rejected';
            $borrow->save();

            return redirect()->back()->with('message','Request Rejected successfully');
        }
        else{
            return redirect()->back()->with('message','Request Not Applied');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $borrow=Borrow::find($id);
        $borrow->delete();
        return redirect()->back()->with('message','Request Delete successfully');
    }
}
