<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   function index()
    {
          return view('welcome');
    }

    function create(Request $request)
    {

        dd($request->all());
    }
    function store(Request $request)
    {
        try {
            // $request->validate([
            //     'bName' => 'required',
            //     'bImg' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            // ]);
            $img = $request->file('cImg');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "categoryImage-{$t}-{$file_name}";
            $img_url = "uploads/categoryImage/{$img_name}";
            // Upload File
            $img->move(public_path('uploads/categoryImage'), $img_name);
           $category = Category::create([
                'cName' => $request->input('cName'),
                'cImg' => $img_url
            ]);
            return $category;
           // return redirect()->back()->with('success', 'Brand Added Successfully');
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    function edit(){
        //return edit page here
    }
    function update(Category $category,Request $request){

    
       try{
        if($request->hasFile('cImg')){
            $img = $request->file('cImg');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "brandImage-{$t}-{$file_name}";
            $img_url = "uploads/brand/{$img_name}";
            // Upload File
            $img->move(public_path('uploads/brand'), $img_name);
            $category->update([
                'cName' => $request->input('cName'),
                'cImg' => $img_url
            ]);
        }else{
            $category->update([
                'cName' => $request->cName,
            ]);
        }
        return redirect()->back()->with('success', 'Brand Updated Successfully');
        
       }catch(Exception $exception){
        return $exception->getMessage();
       }
        
    }

    function destroy(Category $category,Request $request){
      try{

         //delte category image
         $category->delete();
         return redirect()->back()->with('success', 'Brand Deleted Successfully');
      }catch(Exception $exception){
            return $exception->getMessage();
         
      }
    }

}
