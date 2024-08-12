@extends('admin.index')

@section('content')


          <div class="container ">
            <div class="row">
              <div class="col-md-4 col-12 ">
                <div class="card border border-danger statistic-block block">
                  <div class="card-body progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Books Approved</strong>
                    </div>
                    <div class="number dashtext-1">{{$book_app}}</div>
                  </div>
                </div>
                
              </div>
              <div class="col-md-4 col-12 ">
                <div class="card border border-danger statistic-block block">
                  <div class="card-body progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Books returned</strong>
                    </div>
                    <div class="number dashtext-1">{{$book_returned}}</div>
                  </div>
                  
                </div>
                
              </div>
              <div class="col-md-4 col-12">
                <div class="card border border-danger statistic-block block">
                  <div class="card-body progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-info"></i></div><strong>Books applied</strong>
                    </div>
                    <div class="number dashtext-1">{{$book_applied}}</div>
                  </div>
                  
                </div>
                
              </div>
              <div class="col-md-6 col-12">
                <div class="card border border-danger statistic-block block">
                  <div class="card-body progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-grid"></i></div><strong>Total Categories</strong>
                    </div>
                    <div class="number dashtext-1">{{$categories}}</div>
                  </div>
                 
                </div>
                
              </div>
              <div class="col-md-6 col-12">
                <div class="card border border-danger statistic-block block">
                  <div class="card-body progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Books</strong>
                    </div>
                    <div class="number dashtext-1">{{$books}}</div>
                  </div>

                </div>
                
              </div>
            </div>
          </div>

@endsection
