<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\ReturnedProducts;
use App\Product;
use Illuminate\Http\Request;

class ReturnedProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function return(Request $request)
    {
        //
	      extract($request->all());
	    
        $product = Product::find($id);
        $product->qty - $qty;
        $product->save();

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReturnedProducts  $returnedProducts
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnedProducts $returnedProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReturnedProducts  $returnedProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnedProducts $returnedProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReturnedProducts  $returnedProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnedProducts $returnedProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReturnedProducts  $returnedProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnedProducts $returnedProducts)
    {
        //
    }
}
