<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Sticker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminStickerController extends Controller
{
     //function to view stickers page in admin panel
    public function index(){
        $categories=Category::all();
        $collections=Collection::all();
        $stickers=Sticker::all();
        return view('admin.sticker.sticker',compact('categories','collections','stickers'));   
    }

      //function to validation the sticker inputs and add new sticker to the database
      public function add(Request $request){
        $sticker =  new Sticker;        
        $validator= Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|max:3',
            'size' => 'required|max:255',
            'description' => 'max:255',   
            'image' => 'required|mimes:jpg,png,jpeg|max:2000',
            'collection_name' => 'required|string',
            'category_name' => 'required|string'
        ]);
        $validator->validate();
        $img = null;
        if($request->hasfile('image') && $request->file('image')->isValid()){
            $file= $request->file('image');
            $img = $file->store('/uploads/images' ,'public');
            dd($img);
        }
       $sticker->name =$request->input('name');
       $sticker->image =$img;
       $sticker->price =$request->input('price');
       $sticker->size =$request->input('size');
       $sticker->description =$request->input('description');
       $sticker->collection_id= $request->input('collection');
       $sticker->category_id= $request->input('category');
       $sticker->save();
      session()->flash('message','sticker has been created successfully!');
      return redirect('sticker');
    }
     //function to delete sticker by sticker id
    public function delete($id){
        $sticker = Sticker::find($id);
        if ($sticker != null) {
        $sticker->delete();
        session()->flash('message','Sticker has been deleted successfully!');
        return redirect('sticker');}
    }
     //function to view form to edit sticker
    public function edit($id){
        $categories=Category::get();
        $collections=Collection::get();
        $sticker=Sticker::find($id);
        return view('admin.sticker.edit',compact('categories','collections','sticker'));
    }
     //function to edit sticker by sticker id
    public function update(Request $request,$id){
        //some validation of the sticker inputs 
        $sticker = Sticker::find($id);  
        $validator= Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|max:3',
            'size' => 'required|max:255',
            'description' => 'max:255',
            'image' => 'mimes:jpg,png,jpeg|max:2000',
            'collection_name' => 'required|string',
            'category_name' => 'required|string'
        ]);
        $validator->validate();
        $new_image = $sticker->image;
        $old_image = $sticker->image;
        if($request->hasfile('image') && $request->file('image')->isValid()){
            $file= $request->file('image');
            $new_image = $file->store('/uploads/images' ,'public');
        
        if($old_image!=$new_image){
            Storage::disk('public')->delete($old_image);
        }
    }
       $sticker->name =$request->input('name');
       $sticker->image =$new_image;
       $sticker->price =$request->input('price');
       $sticker->size =$request->input('size');
       $sticker->description =$request->input('description');
       $sticker->collection_id= $request->input('collection');
       $sticker->category_id= $request->input('category');
       $sticker->save();
      session()->flash('message','Sticker has been updated successfully!');
      return redirect('sticker');
    }
}

/*
     //function to add new sticker to the database
     public function add(Request $request){
        $this->validate($request, [
           'name' => 'required|string|max:255',
           'price' => 'required|integer|max:3',
           'size' => 'required|max:255',
           'description' => 'max:255',
           'image' => 'required|mimes:jpg,png,jpeg|max:2000',
           'collection_name' => 'required|string',
           'category_name' => 'required|string'
       ]);
       $sticker =  new Sticker;
      if($request->hasfile('image')){
          $extension= $request->file('image')->getClientOriginalExtension();
          $filename= time(). '.' .$extension;
          $request->file('image')->move('assets/uploade/sticker' .$filename);
          $sticker->image =$filename;
      }
      $sticker->name =$request->input('name');
      $sticker->image =$request->input('image');
      $sticker->price =$request->input('price');
      $sticker->size =$request->input('size');
      $sticker->description =$request->input('description');
      $sticker->collection_id= $request->input('collection');
      $sticker->category_id= $request->input('category');
      $sticker->save();
     session()->flash('message','sticker has been created successfully!');
     return redirect('sticker');
   }
    //function to delete sticker by category id
   public function delete($id){
       $sticker = Sticker::find($id);
       if ($sticker != null) {
       $sticker->delete();
       session()->flash('message','Sticker has been deleted successfully!');
       return redirect('sticker');}
   }
    //function to view form to edit sticker
   public function edit($id){
       $categories=Category::get();
       $collections=Collection::get();
       $sticker=Sticker::find($id);
       return view('admin.sticker.edit',compact('categories','collections','sticker'));
   }
    //function to edit sticker by sticker id
   public function update(Request $request,$id){
       $sticker = Sticker::find($id);  
       $this->validate($request, [
           'name' => 'required|string|max:255',
           'price' => 'required|integer|max:3',
           'size' => 'required|max:255',
           'description' => 'max:255',
           'image' => 'mimes:jpg,png,jpeg|max:2000',
           'collection_name' => 'required|string',
           'category_name' => 'required|string'
       ]);
       $sticker->name =$request->input('name');
       $sticker->image =$request->input('image');
       $sticker->price =$request->input('price');
       $sticker->size =$request->input('size');
       $sticker->description =$request->input('describe');
       $sticker->collection_id=$request->input('collection');
       $sticker->category_id=$request->input('category');  
       $sticker->update();
       session()->flash('message','Sticker has been updated successfully!');
       return redirect('sticker');
   }
}*/

