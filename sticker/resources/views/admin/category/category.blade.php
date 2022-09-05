@extends('layouts.admin')

@section('content')
              <div class="container">
                       <!--display category form to add category -->                 
                    <div class="admin-form">
                        <form action="{{route('category')}}" method="POST">
                        @csrf
                            <h4>Add new Category..</h4>
                            <input type="text" placeholder="category name" name="category" class="box">
                            <div style="color:red">@error('category'){{ $message }}@enderror</div> 
                            <div class="d-grid"><button type="submit" class="btn btn-dark">Add</button></div>
                        </form>
                       </div>
                       <div class="admin-show">
                       <!--display category data table -->                          
                           <table class="table">
                           @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <thead>
                               <tr>
                               <th scope="col">category name</th>
                               <th colspan="2">Action</th>
                               </tr>
                        </thead>
                        <tbody>
                               @foreach($categories as $category)
                               <tr >
                               <td>{{$category->category}}</td>
                               <td colspan="2">
                               <a type="submit" class="btn btn-secondary" href="/edit-category/{{$category->id}}"><i class="fas fa-edit"></i></a>
                               <a type="submit" class="btn btn-danger" href="/delete-category/{{$category->id}}"><i class="fas fa-trash"></i></a>
                               </td>
                               </tr>
                        </tbody>
                               @endforeach
                           </table>
                       </div>
                       </div>
                       </div>     
@endsection