<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
	    $items = Warehouse::all();
	    return view("admin.warehouse.index",compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	    $shops = [];
	    return view("admin.warehouse.create",compact('shops'));
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
	    $this->validate($request, [
		    'title' =>'required',
	    ]);
	
	
	    $prod = Warehouse::add($request->all());
	
	    return redirect()->route('warehouse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
	    $sl = Warehouse::find($id);
	    return view("admin.warehouse.edit",compact('sl', 'shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
	    $this->validate($request, [
		    'title' =>'required',
	
	    ]);
	
	    $post = Warehouse::find($id);
	    $post->edit($request->all());
	
	
	    return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse, $id)
    {
        //
	    $product = Warehouse::find($id);
	
	    $product->delete();
	    return redirect()->route('warehouse.index');
    }
}
