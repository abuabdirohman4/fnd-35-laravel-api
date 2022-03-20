<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function get(){
        $data = Product::all();
        return response()->json(
            [
                "message" => "GET Method Success",
                "data" => $data
            ]
        );
    }
    function getById($id){
        // $data = Product::where('id', $id)->get();
        $data = Product::where('id', $id)->get()->first();
        if ($data) {
            return response()->json(
                [
                    "message" => "GET Method Spesific id Success",
                    "data" => $data
                ]
            );
        }
        return response()->json(
            [
                "message" => "Product with id " . $id . " not found"
            ], 400
        );
    }

    function post(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;

        $product->save();

        return response()->json(
            [
                "message" => "POST Method Success",
                "data" => $product
            ]
        );
    }
    function put($id, Request $request){
        // $product = Product::where('id', $id)->first();
        $product = Product::firstWhere('id', $id);
        if ($product) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
            $product->active = $request->active ? $request->active : $product->active;

            $product->save();

            return response()->json(
                [
                    "message" => "PUT Method Success " ,
                    "data" =>  $request->name
                ]
            );
        }
        return response()->json(
            [
                "message" => "Product with id " . $id . " not found"
            ], 400
        );
    }
    function delete($id){
        $product = Product::firstWhere('id', $id);
        if ($product) {
            $product->delete();
            return response()->json(
                [
                    "message" => "DELETE Product id " . $id . " Success"
                ]
            );
        }
        return response()->json(
            [
                "message" => "Product with id " . $id . " not found"
            ], 400
        );
    }
}
