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
   
        <div class="text-center">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}

                            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                    </div>
                @endif
            </div> 


<div class="item-details-page">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-heading">
            <div class="line-dec"></div>
            <h2>View Details <em>For Item</em> Here.</h2>
            </div>
        </div>
        <div class="col-lg-7">
          <div class="left-image">
            <img src="{{asset($book->book_img)}}" alt="" style="border-radius: 20px;">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h4>{{$book->title}}</h4>
          <span class="author">
            <img src="{{asset($book->author_img)}}" alt="" style="max-width: 50px; border-radius: 50%;">
            <h6>{{$book->author_name}}</h6>
          </span>
          <p>{{$book->description}}</p>
          <div class="row">
            <div class="col-12">
              <span class="bid">
                Available<br><strong>{{$book->quantity}}</strong><br>
              </span>
            </div>
            <div class="col-6">
                    <a href="{{route('borrow.book',$book->id)}}" class="btn btn-primary form-control">Apply to Borrow</a>
            </div>
          </div>
          
        </div>
        
    </div>
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