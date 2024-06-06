
@extends('admin.index')
@section('content')
<div class="text-center font-bold">
    <h1>Books Lists</h1>
</div>
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
                </div>
                <div class="card-body"> 
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">author_name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">description</th>
                            <th scope="col">book_img</th>
                            <th scope="col">author_img</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach($books as $book)
                    <tbody>
                        <tr>
                            <th scope="row">{{$book->id}}</th>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author_name}}</td>
                            <td>{{$book->price}}</td>
                            <td>{{$book->quantity}}</td>
                            <td>{{$book->description}}</td>
                            <td><img src="{{asset($book->book_img)}}" alt="" style="width:50px;height:50px;"></td>
                            <td><img src="{{asset($book->author_img)}}" alt="" style="width:50px;height:50px;"></td>
                            <td>{{$book->category->cat_title}}</td>
                            <td>
                                <a href="{{route('edit.book',$book->id)}}" class="btn btn-success  ">Update</a>
                                <a onclick="confirmation(event)" href="{{route('delete.book',$book->id)}}" class="btn btn-danger  ">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                </div>
            </div>

@endsection
