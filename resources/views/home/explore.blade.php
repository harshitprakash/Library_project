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
                        <li><a href="{{route('home.explore')}}"class="text-white">All Category</a></li>
                        @foreach($categories as $category)
                            <li data-filter="*"  >
                                <a href="{{route('category.search',$category->id)}}"class="text-white">{{$category->cat_title}}</a> 
                            </li>
                        @endforeach
                    </ul>
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
            <div class="col-12">
                <form action="{{route('book.search')}}" class="mb-4 " method="get">
                    @CSRF
                    <div class="row">
                    <div class="col-lg-10 col-8">
                        <input type="text" class="form-control" name="search" placeholder="Search Here">
                    </div>
                    <div class="col-lg-2 col-4">
                        <button class="btn btn-info form-control" type="submit" value="search">Search</button>
                    </div>
                    </div>
                </form>
            </div>
            
            <div class="col-12 ">
                  @if(isset($selectedCategory))
                    <div class="section-heading text-center">
                          <h2><em>Selected Category : </em>{{ $selectedCategory->cat_title }}</h2>
                    </div>
                  @else
                  <div class="section-heading text-center">
                      <h2><em>All</em> Books</h2>
                  </div>
                  @endif
            </div>
            <div class="col-12">
              <div class="row">
              @foreach($books as $book)
                <div class="col-lg-6 col-12">
                  <div class="item container row">
                      <div class="col-lg-6 col-12" >
                        <center>
                          <img src="{{asset($book->book_img)}}" alt="" style="border-radius: 20px;">
                        </center>
                      </div>
                      <div class="col-lg-6 col-12 mt-4 ">
                        <div>
                              <div class="">
                                <h6>TITLE : {{$book->title}}</h6> 
                                <h6 class="mt-2">AUTHOR : {{$book->author_name}}</h6>
                                <span class="mt-2">
                                <img src="{{asset($book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
                              </span>
                              </div>
                              
                              <div class="line-dec"></div>
                              <span class="bid">
                                Current Available<br><strong>{{$book->quantity}}</strong><br> 
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