
@extends('admin.index')
@section('content')

    <div class="text-center">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}

                            <button type="button" class="close" data-dismiss="alert">X</button>
                    </div>
                @endif
    </div>            
            <div class="card">
                <div class="card-header">
                    <h1 class="h5 no-margin-bottom">Add Category</h1>
                </div>
                <div class=" card-body"> 
                    <form action="{{route('create.category')}}" Method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category</label>
                        <input type="text" class="form-control" name="cat_title" placeholder="Add Category">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>         
            <div class="card">
                <div class="card-header">
                <h1>Category Title</h1>
                </div>
                <div class="card-body"> 
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach($categories as $category)
                    <tbody>
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->cat_title}}</td>
                            <td>
                                <a href="{{route('edit.category',$category->id)}}" class="btn btn-success  ">Update</a>
                                <a onclick="confirmation(event)" href="{{route('delete.category',$category->id)}}" class="btn btn-danger  ">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                </div>
            </div>



@endsection
