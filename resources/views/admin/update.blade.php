@extends('admin.index')
@section('content')

<div class="card">
                <div class="card-header">
                    <h1 class="h5 no-margin-bottom">Add Category</h1>
                </div>
                <div class=" card-body"> 
                    <form action="{{route('update.cat',$category->id)}}" Method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category</label>
                        <input type="text" class="form-control" name="cat_title" value="{{$category->cat_title}}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>

@endsection