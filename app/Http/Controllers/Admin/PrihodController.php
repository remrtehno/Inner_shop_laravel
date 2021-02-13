<?php

namespace App\Http\Controllers\Admin;

use App\Prihod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProdCat;
use App\Product;
use App\Shops;
use App\suppliers;
use App\User;
use App\Warehouse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PrihodController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$prod   = Prihod::all();
		$prihod = DB::select( 'SELECT `created_at`,
																					`article`,
																					`batch`,
																					`qty`,
																					`buy_price`,
																					`price`,
																					`sklad`,
																					`supplier`
																					
																					FROM `products`' );
		
		
		return view( "admin.prihod.index", compact( 'prod', 'prihod' ) );
		
		
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
		
		return view( "admin.prihod.create", compact( 'cat', 'shops', 'users', 'warehouse', 'suppliers' ) );
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
		
		
		$prod = Prihod::add( $request->all() );
		
		
		return redirect()->route( 'prihod.index' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Prihod $prihod
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Prihod $prihod ) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Prihod $prihod
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Prihod $prihod ) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Prihod $prihod
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Prihod $prihod ) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Prihod $prihod
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Prihod $prihod ) {
		//
	}
}
