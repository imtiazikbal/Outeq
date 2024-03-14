<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ProductDetails;

class ProductDetailsController extends Controller
{
    function index()
    {
    }
    function create()
    {
    }
    function edit()
    {
    }
    function store(Request $request)
    {
        try {
            //image 1 
            $image1 = $request->file('image1');
            $t = time();
            $file_name = $image1->getClientOriginalName();
            $img_name = "productDetails-{$t}-{$file_name}";
            $img_url1 = "uploads/productDetails/{$img_name}";
            // Upload File
            $image1->move(public_path('uploads/productDetails'), $img_name);


            //image 2
            $image2 = $request->file('image2');
            $t = time();
            $file_name = $image2->getClientOriginalName();
            $img_name = "productDetails-{$t}-{$file_name}";
            $img_url2 = "uploads/productDetails/{$img_name}";
            // Upload File
            $image2->move(public_path('uploads/productDetails'), $img_name);


            //image 3
            $image3 = $request->file('image3');
            $t = time();
            $file_name = $image3->getClientOriginalName();
            $img_name = "productDetails-{$t}-{$file_name}";
            $img_url3 = "uploads/productDetails/{$img_name}";
            // Upload File
            $image3->move(public_path('uploads/productDetails'), $img_name);


            //image 4
            $image4 = $request->file('image4');
            $t = time();
            $file_name = $image4->getClientOriginalName();
            $img_name = "productDetails-{$t}-{$file_name}";
            $img_url4 = "uploads/productDetails/{$img_name}";
            // Upload File
            $image4->move(public_path('uploads/productDetails'), $img_name);

            ProductDetails::create([
                'image1' => $img_url1,
                'image2' => $img_url2,
                'image3' => $img_url3,
                'image4' => $img_url4,
                'des'=>$request->des,
                'color'=>$request->color,
                'product_id'=>$request->product_id
            ]);
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
