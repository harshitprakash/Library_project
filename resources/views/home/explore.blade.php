<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Liberty NFT Marketplace - HTML CSS Template</title>
    <base href="/public">
   @include('home.css')
<!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  @include('home.header')

    
   
                                
<div class="currently-market">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                        <h2><em>Items</em> Currently In The Market.</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="filters">
                    <ul class="active">
                        <li class="active">All Category</li>
                        @foreach($categories as $category)
                            <li data-filter="*"  >
                                <a href="{{route('category.search',$category->id)}}">{{$category->cat_title}}</a> 
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}

                            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                    </div>
                @endif
            </div> 

        <form action="{{route('book.search')}}" class="mb-10" method="get">
            @CSRF
            <div class="row">
            <div class="col-sm-10">
                <input type="text" class="form-control" name="search" placeholder="Search Here">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-info form-control" type="submit" value="search">Search</button>
            </div>
            </div>
        </form>
       
        <div class="col-lg-12">
          <div class="row grid">
          @foreach($books as $book)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="assets/images/book1.webp" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$book->title}}</h4>
                  <span class="author">
                    <img src="assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$book->author_name}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{$book->quantity}}</strong><br> 
                  </span>
                  <span class="ends">
                    Total<br><strong>20</strong><br>
                  </span>
                  <div class="text-button">
                  <a href="{{route('book.details',$book->id)}}">View Item Details</a>
                  </div>
                      <br>
                  <div class="">
                  <a href="{{route('borrow.book',$book->id)}}" class="btn btn-primary form-control">Apply to Borrow</a>
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
  @include('home.footer')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>