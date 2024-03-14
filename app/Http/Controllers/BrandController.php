<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function index()
    {
        //  return view('brand.index');
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
            $img = $request->file('bImg');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "brandImage-{$t}-{$file_name}";
            $img_url = "uploads/brand/{$img_name}";
            // Upload File
            $img->move(public_path('uploads/brand'), $img_name);
           $brand = Brand::create([
                'bName' => $request->input('bName'),
                'bImg' => $img_url
            ]);
            return $brand;
           // return redirect()->back()->with('success', 'Brand Added Successfully');
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
    function edit(){
        //return edit page here
    }
    function update(Brand $brand,Request $request){

       try{
        if($request->hasFile('bImg')){
            $img = $request->file('bImg');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "brandImage-{$t}-{$file_name}";
            $img_url = "uploads/brand/{$img_name}";
            // Upload File
            $img->move(public_path('uploads/brand'), $img_name);
            $brand->update([
                'bName' => $request->input('bName'),
                'bImg' => $img_url
            ]);
        }else{
            $brand->update([
                'bName' => $request->bName,
            ]);
        }
        return redirect()->back()->with('success', 'Brand Updated Successfully');
        
       }catch(Exception $exception){
        return $exception->getMessage();
       }
        
    }
    function destroy(Brand $brand,Request $request){
        try{
            // brand image delete
            $brand->delete();
        }catch(Exception $exception){
            return $exception->getMessage();
            
        }
    }
}
