@extends('layouts.admin')

@section('content')
              <div class="container">
                    <div class="admin-form">
                          <!--display sticker form to add sticker --> 
                        <form action="{{ route('sticker') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <h4>Add new sticker..</h4>
                            <input type="text" placeholder="sticker name" name="name" class="box" >
                            <span style="color:red">@error('name'){{ $message }}@enderror</span> 
                            <input type="number" placeholder="sticker price" name="price" class="box" >
                            <span style="color:red">@error('price'){{ $message }}@enderror</span> 
                            <input type="text" placeholder="sticker size" name="size" class="box" >
                            <span style="color:red">@error('size'){{ $message }}@enderror</span> 
                            <input type="text" placeholder="sticker describe" name="description" class="box" >
                            <span style="color:red">@error('description'){{ $message }}@enderror</span> 
                            <input type="file" accept="image/png, image/jpg, image/jpeg" name="image" class="box" >
                            <span style="color:red">@error('image'){{ $message }}@enderror</span>
                            <div>
                                <select name="collection" class="box">
                                    <option value="" >Select collection</option>
                                    @foreach ($collections as $collection)
                                    <option  value="{{$collection->id}}" >{{$collection->collection}}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('collection'){{ $message }}@enderror</span> 
                            </div>
                           <div>
                                <select name="category" class="box">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                                <span style="color:red">@error('category'){{ $message }}@enderror</span> 
                            </div>
                            <div class="d-grid"><button type="submit" class="btn btn-dark">Add</button></div>
                        </form>
                       </div>

                       <div class="admin-show">
                           <!--display stickers data table -->                          
                           <table class="table">
                           @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <thead>
                               <tr>
                               <th scope="col">sticker image</th>
                               <th scope="col">sticker name</th>
                               <th scope="col">sticker price</th>
                               <th scope="col">sticker size</th>
                               <th scope="col">sticker describe</th>
                               <th scope="col">collection name</th>
                               <th scope="col">category name</th>
                               <th  colspan="2">Action</th>
                               </tr>
                        </thead>
                        <tbody>
                               @foreach ($stickers as $sticker)
                               <tr class="data">
                               <td class="text-wrap" width="200rem"><img src="{{ asset('/images/stickers/' .$sticker->image)}}" width="70" hight="70"></td>
                               <td class="text-wrap" width="200rem">{{$sticker->name}}</td>
                               <td class="text-wrap" width="200rem">{{$sticker->price}}</td>
                               <td class="text-wrap" width="200rem">{{$sticker->size}}</td>
                               <td class="text-wrap" width="200rem">{{$sticker->description}}</td>
                               <td class="text-wrap" width="200rem">{{$sticker->collection->collection}}</td> 
                               <td class="text-wrap" width="200rem">{{$sticker->category->category}}</td>
                               <td colspan="2">
                               <a type="submit" class="btn btn-secondary" href="/edit-sticker/{{$sticker->id}}"><i class="fas fa-edit"></i></a>
                               <a type="submit" class="btn btn-danger" href="/delete-sticker/{{$sticker->id}}"><i class="fas fa-trash"></i></a>
                               </td>
                               </tr>
                        </tbody>
                               @endforeach
                           </table>
                       </div>
                       </div>                                        
@endsection
