<div class="categories-collections">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="categories">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Browse Through Book <em>Categories</em> Here.</h2>
                </div>
              </div>
            @foreach($categories as $category)
            
              <div class="col-lg-3 col-sm-6">
                <div class="item">
                    <a href="{{ route('category.search', $category->id) }}">
                      <div class="icon">
                        <img src="assets/images/icon-01.png" alt="">
                      </div>
                      <h4>{{$category->cat_title}}</h4>
                    </a>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
