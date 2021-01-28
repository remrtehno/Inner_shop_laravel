<?php

namespace App\Http\Controllers\Profile;

use App\ProdCat;
use App\Product;
use App\Shops;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prod = Product::where('user_id', '=', Auth::id())->get();
       return view("profile.post.index",compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cat = ProdCat::getCategory();
        $user_id = Auth::id();
        $shops = Shops::where('user_id', '=', $user_id)->get();
        return view("profile.post.create",compact('cat', 'user_id', 'shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            //'anonce' =>'required',
//            'text' =>'required',

            'img' =>  'nullable|image'
        ]);


        $prod = Product::add($request->all());
        $prod->uploadImage($request->file('img'));
        $prod->setCategory($request->get('category_id'));
        $prod->setShop($request->get('shop_id'));
      
        return $this->index();
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
        $user_id = Auth::id();
        $shops = Shops::where('user_id', '=', $user_id)->get();
        $cat = ProdCat::all();
        $sl = Product::find($id);
        
        return view("profile.post.edit",compact('cat','sl','user_id', 'shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'shop_id' =>'required',
            'img' =>  'nullable|image'
        ]);

        $post = Product::find($id);
        $post->edit($request->all());
        $post->setCategory($request->get('category_id'));
        $post->uploadImage($request->file('img'));
        $post->setShop($request->get('shop_id'));

        $post->setHits($request->get('is_hits'));
        $post->setSale($request->get('is_sale'));

        

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);


        if($product->img !=null){
            Storage::delete('/uploads/products/small/' . $product->img);


        }
        $product->delete();
        return $this->index();
    }

}
