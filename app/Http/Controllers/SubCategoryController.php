<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
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
            
           $subCategory = SubCategory::create([
                'sub_category_name' => $request->input('sub_category_name'),
                'category_id'=>$request->input('category_id '),
            ]);
            return $subCategory;
           // return redirect()->back()->with('success', 'Brand Added Successfully');
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    function edit(){
        //return edit page here
    }
    function update(SubCategory $subCategory,Request $request){

    
       try{
       
            $subCategory->update([
                'sub_category_name' => $request->input('sub_category_name'),
                'category_id'=>$request->input('category_id '),
            ]);
      
        return redirect()->back()->with('success', 'Sub Category Updated Successfully');
        
       }catch(Exception $exception){
        return $exception->getMessage();
       }
        
    }
    function destroy(SubCategory $subCategory,Request $request){
      try{
         $subCategory->delete();
         return redirect()->back()->with('success', 'Sub Category Deleted Successfully');
      }catch(Exception $exception){
            return $exception->getMessage();
         
      }
    }
}
