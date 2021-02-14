<?php

namespace App\Http\Controllers\Admin;

use App\PaymentSupplier;
use App\suppliers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentSupplierController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$items = PaymentSupplier::all();
		
		return view( "admin.payments-supplier.index", compact( 'items' ) );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		$shops = suppliers::all();
		
		return view( "admin.payments-supplier.create", compact( 'shops' ) );
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
			'supplier_id' => 'required',
			'dollar_rate' => 'required',
			'usd'         => 'required',
			'cash'        => 'required',
			'terminal'    => 'required',
		] );
		
		
		$prod = PaymentSupplier::add( $request->all() );
		
		return redirect()->route( 'payments-supplier.index' );
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\payment_suplier $payment_suplier
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( payment_suplier $payment_suplier ) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\payment_suplier $payment_suplier
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		$shops = suppliers::all();
		$sl    = PaymentSupplier::find( $id );
		
		return view( "admin.payments-supplier.edit", compact( 'sl', 'shops' ) );
		
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\payment_shop $payment_shop
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$this->validate( $request, [
			'supplier_id' => 'required',
			'dollar_rate' => 'required',
			'usd'         => 'required',
			'cash'        => 'required',
			'terminal'    => 'required',
		] );
		
		$post = PaymentSupplier::find( $id );
		$post->edit( $request->all() );
		
		
		return redirect()->route( 'payments-supplier.index' );
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\payment_shop $payment_shop
	 *
	 * @return \Illuminate\Http\Response
	 */
	
	public function destroy( $id ) {
		$product = PaymentShop::find( $id );
		
		$product->delete();
		
		return redirect()->route( 'payments-supplier.index' );
		
	}
	
	
}
