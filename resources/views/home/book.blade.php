
<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>

       
       
        <div class="col-lg-12">
          <div class="row grid">
            @foreach($books as $book)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="{{asset($book->book_img)}}" alt="" style="border-radius: 20px; width:200px;">
                </div>
                <div class="right-content">
                  <h4>{{$book->title}}</h4>
                  <span class="author">
                    <img src="{{asset($book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$book->author_name}}</h6>
                  </span>
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
           @endforeach

          </div>
        </div>
      
      </div>
    </div>
</div>