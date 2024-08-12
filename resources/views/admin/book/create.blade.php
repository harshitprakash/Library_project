
@extends('admin.index')
@section('content')

<div class="card">
                <div class="card-header">
                    <h1 class="h5 no-margin-bottom">Add Books</h1>
                </div>
                <div class=" card-body"> 
                    <form action="{{route('store.book')}}" Method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Add title">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">author_name</label>
                            <input type="text" class="form-control" name="author_name" placeholder="Add author_name">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">price</label>
                            <input type="number" class="form-control" name="price" placeholder="Add price">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Add quantity">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Select category</label>
                            <select name="category_id" class="form-control" required >
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->cat_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Add description" id=""></textarea>
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Book Image</label><br>
                            <input type="file" class="" name="book_img">
                        </div>
                        <div class="mb-3 col-sm-6">
                             <label for="exampleInputPassword1" class="form-label">Author Image</label><br>
                            <input type="file" class="" name="author_img" >
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success form-control text-white">Submit</button>
                    </form>
                </div>
            </div>  

@endsection
