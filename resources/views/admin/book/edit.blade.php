
@extends('admin.index')
@section('content')

<div class="card">
                <div class="card-header">
                    <h1 class="h5 no-margin-bottom">Update Books</h1>
                </div>
                <div class=" card-body"> 
                    <form action="{{route('update.book',$book->id)}}" Method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$book->title}}">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">author_name</label>
                            <input type="text" class="form-control" name="author_name" value="{{$book->author_name}}">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">price</label>
                            <input type="number" class="form-control" name="price" value="{{$book->price}}">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{$book->quantity}}">
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="exampleInputPassword1" class="form-label">Select category</label>
                            <select name="category_id" class="form-control bg-white" required >
                                <option>{{$book->category->cat_title}}</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($book->category_id === $category->id) selected @endif>{{$category->cat_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea class="form-control  bg-white" name="description" id="">{{$book->description}}</textarea>
                        </div>
                        <div class="mb-3 col-sm-6">
                        <img src="{{asset($book->book_img)}}" alt="" style="width:100px;height:100px;">
                            <label for="exampleInputPassword1" class="form-label">Update Book Image</label>
                            <input type="file" class="form-control" name="book_img">
                        </div>
                        <div class="mb-3 col-sm-6">
                        <img src="{{asset($book->author_img)}}" alt="" style="width:100px;height:100px;">
                             <label for="" class="form-label">Update Author Image</label>
                            <input type="file" class="form-control" name="author_img" >
                        </div>
                    
                    </div>
                    <button type="submit" class="btn btn-success form-control text-white">Update</button>
                    </form>
                </div>
            </div>  

@endsection
