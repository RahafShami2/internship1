<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;

class AdminCollectionController extends Controller
{
     //function to view collections page in admin panel
    public function index(){
        $collections= Collection::all();
        return view('admin.collection.collection',['collections'=>$collections]);
    }
     //function to add new collection to the database
    public function add(Request $request){
         //the collection name input should be required,string and less than 255bytes        
         $this->validate($request, [
            'collection' => 'required|string|max:255',
        ]);
        $collection = new Collection();
        $collection->collection =$request->input('collection'); 
        $collection->save();
         session()->flash('message','Collection has been created successfully!');
         return redirect('collection');
    } 
     //function to delete collection by collection id
    public function delete($id){
        $collection = Collection::find($id);
        if ($collection != null) {
            $collection->delete();
        session()->flash('message','Collection has been deleted successfully!');
        return redirect('collection');}
    }
     //function to view form to edit collection
    public function edit($id){
        $collection = Collection::find($id);
        return view('admin.collection.edit',compact('collection'));
    }
     //function to edit collection by collection id
    public function update(Request $request,$id){
        $collection= Collection::find($id);
         //the collection name input should be required,string and less than 255bytes        
         $this->validate($request, [
            'collection' => 'required|string|max:255',
        ]);
        $collection->collection =$request->input('collection'); 
        $collection->update();
        session()->flash('message','Collection has been updated successfully!');
        return redirect('collection');
    }
}
