<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // return view('products.index');
    }

    function store(Request $request)
    {
        try {
            //$request->validate([
            //     'title' =>'required',
            //     'short_des' =>'required',
            //     'price' =>'required',
            //     'image' =>'required',
            // ]);
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "product-{$t}-{$file_name}";
            $img_url = "uploads/product/{$img_name}";
            // Upload File
            
            $img->move(public_path('uploads/product'), $img_name);
        Product::create([
                'title' => $request->title,
                'short_des' => $request->short_des,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount' => $request->discount,
                'image' => $img_url,
                'stock' => $request->stock,
                'star' => $request->star,
                'remark' => $request->remark,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'sub_category_id' => $request->sub_category_id,
                'child_category_id' => $request->child_category_id            
            ]);
            return response()->json([
                'msg'=>'Product Add Successfully',
            ]);
        } catch (Exception $e) {
        }
    }
    function edit(){
        //return
    }
    function update(Product $product, Request $request){

        if($request->hasFile){
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "product-{$t}-{$file_name}";
            $img_url = "uploads/product/{$img_name}";
            // Upload File
            
            $img->move(public_path('uploads/product'), $img_name);
            $product->update([
                'title' => $request->title,
                'short_des' => $request->short_des,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount' => $request->discount,
                'stock' => $request->stock,
                'image' => $img_url,
                'star' => $request->star,
                'remark' => $request->remark,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'sub_category_id' => $request->sub_category_id,
                'child_category_id' => $request->child_category_id
            ]);
            return response()->json([
                'msg'=>'Product Update Successfully',
            ]);
        }else{
            $product->update([
                'title' => $request->title,
                'short_des' => $request->short_des,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount' => $request->discount,
                'stock' => $request->stock,
                'star' => $request->star,
                'remark' => $request->remark,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'sub_category_id' => $request->sub_category_id,
                'child_category_id' => $request->child_category_id
            ]);
            return response()->json([
                'msg'=>'Product Update Successfully',
            ]);
        }
    }
    function destroy(Product $product, Request $request){
        //delele product image
        $product->delete();
        return response()->json([
            'msg'=>'Product Delete Successfully',
        ]);
    }
}
