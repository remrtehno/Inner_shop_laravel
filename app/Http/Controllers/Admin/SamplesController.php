<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Samples;
use App\Product;
use App\Shops;
use Illuminate\Http\Request;

class SamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$items = Samples::all();
        $items = Product::where('is_sample', '=', 1)->get();
        $shops = Shops::all();
        $samples = Samples::all();

      return view("admin.samples.index",compact('items', 'shops', 'samples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $shops = [];
        return view("admin.samples.create",compact('shops'));


        // Samples::create([
        //     'shop_id' => '',
        //     'title' => '',
        // ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());

        foreach ($request->get('shop_id') as $key => $value) {
            $e = implode(",",$value);

            $is_exist = Samples::where('product_id', '=', $key)->count();
            $id_prod = Samples::where('product_id', '=', $key)->get();


            if($is_exist) {

                 $sample = Samples::where('product_id', '=', $key)->first();
                 $sample->shop_id = $e;
                 $sample->save();
            } else {

               Samples::create([
                'shop_id' => $e,
                'product_id' => $key,
                ]); 

            }
             
        }

        return redirect()->route('samples.index');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Samples  $samples
     * @return \Illuminate\Http\Response
     */
    public function show(Samples $samples)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Samples  $samples
     * @return \Illuminate\Http\Response
     */
    public function edit(Samples $samples)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Samples  $samples
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Samples $samples)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Samples  $samples
     * @return \Illuminate\Http\Response
     */
    public function destroy(Samples $samples)
    {
        //
    }
}
