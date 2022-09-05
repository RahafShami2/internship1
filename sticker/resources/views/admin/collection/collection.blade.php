@extends('layouts.admin')

@section('content')
              <div class="container">
                    <div class="admin-form">
                       <!--display coolection form to add collection --> 
                    <form action="{{route('collection')}}" method="POST">
                    @csrf
                    <h4>Add new Collection..</h4>
                            <input type="text" placeholder="collection name" name="collection" class="box">
                            <div style="color:red">@error('collection'){{ $message }}@enderror</div> 
                            <div class="d-grid"><button type="submit" class="btn btn-dark">Add</button></div>
                        </form>                        
                    </div>
                       <div class="admin-show">
                           <!--display collection data table -->                          
                           <table class="table">
                           @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                             <thead>
                             <tr>
                               <th scope="col">collection name</th>
                               <th colspan="2">Action</th>
                             </tr>
                             </thead>
                               @foreach($collections as $collection)
                             <tbody>
                               <tr class="data">
                               <td >{{$collection->collection}}</td>
                               <td colspan="2">
                               <a type="submit" class="btn btn-secondary" href="/edit-collection/{{$collection->id}}"><i class="fas fa-edit"></i></a>
                               <a type="submit" class="btn btn-danger" href="/delete-collection/{{$collection->id}}"><i class="fas fa-trash"></i></a>
                               </td>
                               </tr>
                               </tbody>
                               @endforeach
                           </table>
                       </div>
                       </div>
@endsection