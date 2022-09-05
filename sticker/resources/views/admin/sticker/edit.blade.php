@extends('layouts.admin')

@section('content')
              <div class="container">
                    <div class="admin-form">
                        <!--display sticker form page to add sticker --> 
                    <form action="{{ route('sticker.update', $sticker->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf  
                        @method('PUT')
                            <h4>Edit Sticker..</h4>
                            <input type="text" value="{{old('name') ?? $sticker->name }}" placeholder="sticker name" name="name" class="box" >
                            <span style="color:red">@error('name'){{ $message }}@enderror</span> 
                            <input type="number" value="{{old('price') ?? $sticker->price }}" placeholder="sticker price" name="price" class="box" >
                            <span style="color:red">@error('price'){{ $message }}@enderror</span> 
                            <input type="text" value="{{old('size') ?? $sticker->size }}" placeholder="sticker size" name="size" class="box" >
                            <span style="color:red">@error('size'){{ $message }}@enderror</span> 
                            <input type="text" value="{{old('description') ?? $sticker->description }}" placeholder="sticker describe" name="description" class="box" >
                            <span style="color:red">@error('description'){{ $message }}@enderror</span> 
                            <input type="file" value="{{old('image') ?? $sticker->image }}" accept="image/png, image/jpg, image/jpeg" name="image" class="box" >
                            <span style="color:red">@error('image'){{ $message }}@enderror</span>
                           <div>
                                <select name="collection" class="box">
                                    <option >Select collection</option>
                                    @foreach ($collections as $collection)
                                    <option value="{{old('collection') ?? $collection->collection }}" value="{{$collection->id}}" >{{$collection->collection}}
                                    </option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('collection'){{ $message }}@enderror</span> 
                            </div>
                            <div>
                                <select  name="category" class="box">
                                    <option  >Select category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" >{{$category->category}}
                                    </option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('category'){{ $message }}@enderror</span> 
                            </div>
                            <div class="d-grid"><button  type="submit" class="btn btn-dark">Update</button></div>
                        </form>
                       </div>
              </div>
@endsection