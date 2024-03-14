<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ChildCategory;

class ChildCategoryController extends Controller
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
            
           $childCategory = ChildCategory::create([
            'child_category_name' => $request->input('child_category_name'),
            'sub_category_id'=>$request->input('sub_category_id'),
            ]);
            return $childCategory;
           // return redirect()->back()->with('success', 'Brand Added Successfully');
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    function edit(){
        //return edit page here
    }
    function update(ChildCategory $childCategory,Request $request){

    
       try{
       
            $childCategory->update([
                'child_category_name' => $request->input('child_category_name'),
                'sub_category_id'=>$request->input('sub_category_id'),
            ]);
      
        return redirect()->back()->with('success', 'Sub Category Updated Successfully');
        
       }catch(Exception $exception){
        return $exception->getMessage();
       }
        
    }
    function destroy(ChildCategory $childCategory,Request $request){
      try{
         $childCategory->delete();
         return redirect()->back()->with('success', 'Sub Category Deleted Successfully');
      }catch(Exception $exception){
            return $exception->getMessage();
         
      }
    }
}
