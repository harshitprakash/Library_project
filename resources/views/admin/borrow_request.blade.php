
@extends('admin.index')
@section('content')
<div class="container">
<div class="col-sm-12 text-center font-bold">
    <h1>Borrow Requests</h1>
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
                <div class="card-body " style="overflow-x:auto;"> 
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach($data as $borrow)
                    <tbody>
                        <tr>
                            <th scope="row">{{$borrow->id}}</th>
                            <td>{{$borrow->user->name}}</td>
                            <td>{{$borrow->user->email}}</td>
                            <td>{{$borrow->user->phone}}</td>
                            <td>{{$borrow->book->title}}</td>
                            <td>{{$borrow->book->quantity}}</td>
                            <td>
                                @if($borrow->status == 'Rejected')
                                    
                                    <span style="color:red;">{{$borrow->status}}</span>
                                @endif

                                @if($borrow->status == 'Approved')
                                    
                                    <span style="color:green;">{{$borrow->status}}</span>
                                @endif

                                @if($borrow->status == 'Returned')
                                    
                                    <span style="color:skyblue;">{{$borrow->status}}</span>
                                @endif

                                @if($borrow->status == 'Applied')
                                    <span style="color:white;">{{$borrow->status}}</span>
                                @endif
                                
                            </td>
                            <td>
                                @if($borrow->status == 'Applied')
                           
                                <a href="{{route('approve.book',$borrow->id)}}" class="btn btn-success">Approved</a>
                                <a href="{{route('reject.book',$borrow->id)}}" class="btn btn-danger">Rejected</a>
                                
                                @endif

                                @if($borrow->status == 'Approved')
                                
                                    <a href="{{route('returned.book',$borrow->id)}}" class="btn btn-info">Returned</a>
                                
                                @endif

                                @if($borrow->status == 'Rejected'||$borrow->status == 'Returned')
                                
                                    <a href="{{route('delete.request',$borrow->id)}}" class="btn btn-danger">Delete</a>
                                
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
</div>
@endsection
