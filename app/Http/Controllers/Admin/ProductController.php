<?php

namespace App\Http\Controllers\Admin;

use App\ProdCat;
use App\Product;
use App\Shops;
use App\suppliers;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		
		$prod = Product::groupBy( 'article', 'batch', 'qty' , 'buy_price', 'supplier', 'price', 'sklad' )->select( DB::raw( "SUM(`qty`) AS `quantity_sum`" ),
			'article',
			'batch',
			'qty',
			'buy_price',
			'supplier',
			'price',
			'sklad'
			
			)->get();

		
		return view( "admin.post.index", compact( 'prod' ) );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$shops     = Shops::all();
		$cat       = ProdCat::getCategory();
		$users     = User::all();
		$warehouse = Warehouse::all();
		$suppliers = suppliers::all();
		
		return view( "admin.post.create", compact( 'cat', 'shops', 'users', 'warehouse', 'suppliers' ) );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$this->validate( $request, [
			'article' => 'required',
		
		] );
		
		
		$prod = Product::add( $request->all() );
		$prod->uploadImage( $request->file( 'img' ) );
		$prod->setCategory( $request->get( 'category_id' ) );
		$prod->setShop( $request->get( 'shop_id' ) );
		
		return redirect()->route( 'post.index' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$warehouse = Warehouse::all();
		$shops     = Shops::all();
		$cat       = ProdCat::all();
		$sl        = Product::find( $id );
		$suppliers = suppliers::all();
		
		return view( "admin.post.edit", compact( 'cat', 'sl', 'shops', 'warehouse', 'suppliers' ) );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$this->validate( $request, [
			'article' => 'required',
			'img'     => 'nullable|image'
		] );
		
		$post = Product::find( $id );
		$post->edit( $request->all() );
		$post->setShop( $request->get( 'shop_id' ) );
		$post->setCategory( $request->get( 'category_id' ) );
		$post->uploadImage( $request->file( 'img' ) );
		
		return redirect()->route( 'post.index' );
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		$product = Product::find( $id );
		
		
		if ( $product->img != null ) {
			Storage::delete( '/uploads/products/small/' . $product->img );
			
			
		}
		$product->delete();
		
		return redirect()->route( 'post.index' );
	}
	
}
