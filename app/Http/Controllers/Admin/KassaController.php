<?php

namespace App\Http\Controllers\Admin;

use App\Kassa;
use App\Prihod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KassaController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 *
	 *
	 * SELECT id, supplier,total_buy, total_usd, (total_buy-total_usd) as ostatok FROM
	 *
	 * (SELECT DISTINCT suppliers.id, products.supplier, SUM(buy_price) as total_buy, t2.total_usd FROM products
	 * LEFT JOIN suppliers
	 * ON products.supplier=suppliers.name
	 *
	 * LEFT JOIN
	 * (SELECT supplier_id,
	 * SUM((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd
	 * FROM payment_suppliers
	 * GROUP BY supplier_id) as t2
	 * ON suppliers.id=t2.supplier_id
	 *
	 *
	 * GROUP BY suppliers.id, products.supplier) as main
	 *
	 *
	 *
	 * SELECT DISTINCT suppliers.id, products.supplier, SUM(buy_price) as total_buy, t2.total_usd FROM products
	 * LEFT JOIN suppliers
	 * ON products.supplier=suppliers.name
	 *
	 * LEFT JOIN
	 * (SELECT supplier_id,
	 * SUM((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd
	 * FROM payment_suppliers
	 * GROUP BY supplier_id) as t2
	 * ON suppliers.id=t2.supplier_id
	 *
	 *
	 * GROUP BY suppliers.id, products.supplier
	 *
	 *
	 *
	 *
	 * SELECT supplier_id,
	 * SUM((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd
	 * FROM payment_suppliers
	 * GROUP BY supplier_id
	 *
	 * //get suppliers with id and pyments
	 *
	 * SELECT DISTINCT suppliers.id, products.supplier, SUM(buy_price) as total_buy FROM products
	 * LEFT JOIN suppliers
	 * ON products.supplier=suppliers.name
	 *
	 *
	 * GROUP BY suppliers.id, products.supplier
	 *
	 *
	 * SELECT ((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd FROM payment_suppliers
	 *
	 * SELECT SUM(total_usd) FROM
	 *
	 * (
	 * SELECT ((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd FROM payment_suppliers ) as t1
	 */
	public function index() {
		//
		$sum_qty          = DB::select( 'select SUM(qty) as cnt from products' );
		$zakup_rozn_price = DB::select( 'select SUM(buy_price) as buy_price, SUM(price) as price from products' );
		$all_prices       = DB::select( 'SELECT supplier_id,
    SUM((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd
    FROM payment_suppliers
    GROUP BY supplier_id' );
		
		$allInfo = DB::select( '  SELECT id, supplier,total_buy, total_usd, (total_buy-total_usd) as ostatok FROM

    (SELECT DISTINCT suppliers.id, products.supplier, SUM(buy_price) as total_buy, t2.total_usd FROM products
    LEFT JOIN suppliers
    ON products.supplier=suppliers.name

    LEFT JOIN
    (SELECT supplier_id,
    SUM((`cash`+`terminal`)/`dollar_rate`+`usd`) as total_usd
    FROM payment_suppliers
    GROUP BY supplier_id) as t2
    ON suppliers.id=t2.supplier_id


    GROUP BY suppliers.id, products.supplier) as main' );
		
		
		return view( "admin.kassa.index", compact( 'sum_qty', 'zakup_rozn_price', 'all_prices', 'allInfo' ) );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Kassa $kassa
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Kassa $kassa ) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Kassa $kassa
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Kassa $kassa ) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Kassa $kassa
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Kassa $kassa ) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Kassa $kassa
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Kassa $kassa ) {
		//
	}
}
