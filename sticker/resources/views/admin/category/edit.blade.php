@extends('layouts.admin')

@section('content')
              <div class="container">
                    <div class="admin-form">
                       <!--display category form page to edit category --> 
                        <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf  
                        @method('PUT')
                            <h4>Edit Category..</h4>
                            <input type="text" value="{{old('category') ?? $category->category }}" placeholder="category name" name="category" class="box">
                            <div style="color:red">@error('category'){{ $message }}@enderror</div> 
                            <div class="d-grid"><button  type="submit" class="btn btn-dark">Update</button></div>
                        </form>
                       </div>
              </div>
@endsection