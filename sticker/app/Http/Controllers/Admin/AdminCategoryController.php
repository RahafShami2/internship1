<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
     //function to view categories page in admin panel
    public function index(){
        $categories=Category::all();
        return view('admin.category.category',['categories'=>$categories]);
    }
     //function to add new category to the database
    public function add(Request $request){
         //the category name input should be required,string and less than 255bytes
         $this->validate($request, [
            'category' => 'required|string|max:255',
        ]);        
         $category = new Category();
         $category->category =$request->input('category'); 
         $category->save();
         session()->flash('message','Category has been created successfully!');
         return redirect('category');
    } 
     //function to delete category by category id
    public function delete($id){
        $category = Category::find($id);
        if ($category != null) {
        $category->delete();
        session()->flash('message','Category has been deleted successfully!');
        return redirect('category');}
    }
     //function to view form to edit category
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
     //function to edit category by category id 
    public function update(Request $request,$id){
        $category = Category::find($id);
         //the category name input should be required,string and less than 255bytes
         $this->validate($request, [
            'category' => 'required|string|max:255',
        ]);
        $category->category =$request->input('category'); 
        $category->update();
        session()->flash('message','Category has been updated successfully!');
        return redirect('category');
    }

}
