<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Log::channel('stderr')->info("products request");
        $products = Product::all();
        Log::channel('stderr')->info("products request",[$products]);

        return response()->json($prproducts,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Log::channel('stderr')->info($request['info']);

        $product = json_decode($request->getContent(),true);

        Log::channel('stderr')->info("added product:",$product);
        Product::create($product);

        return response()->json(['info'=>true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        Log::channel('stderr')->info("update request received");
        $product = json_decode($request->getContent(),true);
        Log::channel('stderr')->info("id product:",$product->id);
        Log::channel('stderr')->info("id product:",$product);
        $updated = Product::where('id',$product['id'])->update($product);

        if($updated){
            return response()->json(['info'=>true],200);
        }

    }

    public function modifyProduct(Request $request)
    {
        //
        Log::channel('stderr')->info("update request received");
        $product = json_decode($request->getContent(),true);

        Log::channel('stderr')->info("id product:",$product);
        $updated = Product::where('id',$product['id'])->update($product);

        if($updated){
            return response()->json(['info'=>true],200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Log::channel('stderr')->info("deleted product:",['id'=>$id]);
        $deleted = Product::where('id',$id)->delete();

        if($deleted){
            return response()->json(['info'=>true],200);
        }


    }
}
