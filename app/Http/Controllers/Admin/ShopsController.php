<?php

namespace App\Http\Controllers\Admin;

use App\Shops;
use App\User;
use App\ReturnedProducts;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        ///$shops = Shops::with(['products'])->withCount('products')->get();
        $shops = Shops::all();

        $returned_products = ReturnedProducts::all();
	    
        return view("admin.shops.index", compact('shops', 'returned_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.shops.create");
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

        $prod = Shops::add($request->all());

        $user_id = User::find($request->get("user_id"));

        $user_id->is_shop = 1;
        $user_id->save();



        return redirect()->route('shops.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {

        $shops = Shops::with(['products'])->withCount('products')->where('user_id', '=', $user_id)->get();
        return view('admin.shops.index',compact('shops'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sl = Shops::find($id);
        return view('admin.shops.edit',compact('sl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shops $shops, $id)
    {
        $this->validate($request, [
            'title' =>'required',
        ]);

        $post = Shops::find($id);
        $post->edit($request->all());

        return redirect()->route('shops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $shops = Shops::find($id);
        $user = User::find($shops->user_id);
        $shops->delete();
        if($user && $user->id) $user->delete();

        return redirect()->route('shops.index');
    }
}
