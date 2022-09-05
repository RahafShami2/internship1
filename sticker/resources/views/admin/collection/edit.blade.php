
@extends('layouts.admin')

@section('content')
              <div class="container">
                    <div class="admin-form">
                       <!--display collection form page to add collection --> 
                        <form action="{{ route('collection.update',$collection->id) }}" method="POST">
                            @method('PUT')
                        @csrf
                            <h4>Edit Category..</h4>
                            <input type="text" value="{{old('collection') ?? $collection->collection }}" placeholder="category name" name="collection" class="box">
                            <div style="color:red">@error('name'){{ $message }}@enderror</div> 
                            <div class="d-grid"><button  type="submit" class="btn btn-dark">Update</button></div>
                        </form>
                       </div>
              </div>
@endsection