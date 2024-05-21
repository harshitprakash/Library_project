<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Liberty NFT Marketplace - HTML CSS Template</title>

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

        <div class="card mt-10">
        <div class="text-center">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}

                            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                    </div>
                @endif
        </div> 
                <div class="card-header">
                </div>
                <div class="card-body"> 
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Book name</th>
                            <th scope="col">book Author</th>
                            <th scope="col">Book Status</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    @foreach($data as $data)
                    <tbody>
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->book->title}}</td>
                            <td>{{$data->book->author_name}}</td>
                            <td>{{$data->status}}</td>
                            <td></td>
                            <td>
                                @if($data->status == 'Applied') 
                                    <a href="{{route('request.cancel',$data->id)}}" class="btn btn-warning">Cancel</a>  
                                    @else
                                    <span>Not Allowed</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
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