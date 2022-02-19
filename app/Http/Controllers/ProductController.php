<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function get(){
        return response()->json(
            [
                "message" => "GET Method Success"
            ]
        );
    }
    function post(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;
        $product->name = $request->name;

        $product->save();

        return response()->json(
            [
                "message" => "POST Method Success",
                "data" => $product
            ]
        );
    }
    function put($id){
        return response()->json(
            [
                "message" => "PUT Method Success " . $id
            ]
        );
    }
    function delete($id){
        return response()->json(
            [
                "message" => "DELETE Method Success " . $id
            ]
        );
    }
}
