
<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Books</em> Currently In The Library.</h2>
          </div>
        </div>

       
       
        <div class="col-12">
          <div class="row grid">
            @foreach($books as $book)
            <div class="col-lg-6 col-12 all msc">
              <div class="item ">
                <div class=" row">
                    <div class="col-12 col-sm-6">
                        <div class="left-image">
                          <img src="{{asset($book->book_img)}}" alt="" style="border-radius: 20px;">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-2">
                    <div class="right-content">
                          <h4><span>Book Title:</span> {{$book->title}}</h4>
                          <span class="author">
                            <h6><span>Author Name:</span> {{$book->author_name}}</h6>
                          </span>
                          <img src="{{asset($book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
                          <div class="line-dec"></div>
                          <span class="bid">
                            Current Available<br><strong>{{$book->quantity}}</strong><br> 
                          </span>
                          <div class="text-button">
                            <a href="{{route('book.details',$book->id)}}">View Item Details</a>
                          </div>
                                <br>
                            <div class="">
                              <a href="{{route('borrow.book',$book->id)}}" class="btn btn-primary">Apply to Borrow</a>
                            </div>
                       </div>
                    </div>
                </div>
                
                
              </div>
            </div>
           @endforeach

          </div>
        </div>
      
      </div>
    </div>
</div>