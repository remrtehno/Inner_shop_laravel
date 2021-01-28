<?php

namespace App\Http\Controllers;

use App\About;
use App\Contact;
use App\Gallery;
use App\Logo;
use App\News;
use App\ProdCat;
use App\Product;
use App\Slider;
use App\Userwrap;
use App\Video;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use Auth;
use Session;


class Cart2 extends Controller {
	public function index() {
		
		
		$title          = "";
		$meta_key       = "";
		$meta_desc      = "";
		$getProductById = "";
		
		return view( "cart.index", compact( 'title', 'meta_key', 'meta_desc', 'getProductById' ) );
	}
	
	
	public function addToCart( $id ) {
		$product = Product::find( $id );
		
		$price = 0;
		if ( $product->price ) {
			$price = $product->price;
		}
		
		Cart::add( $product->id, $product->article, 1, $price );
		
		return redirect( '/cart' );
	}
	
	public function removeProductFromCart( $productId ) {
		
		Cart::remove( $productId );
		
		return redirect( '/cart' );
	}
	
	# Our function for clearing all items from our cart
	public function destroyCart() {
		Cart::destroy();
		
		return redirect( '/' );
	}
	
	public function update( Request $reques, $id ) {
		
		$quantity = $reques->all();
		
		$product = Product::find( $quantity['id'] );
		
		if ( $quantity['quantity'] > $product->qty ) {
			Session::put( 'error', 'На складе ' . $product->qty );
		}
		
		
		Cart::update( $id, (int) $quantity['quantity'] );
		
		
		return redirect( '/cart' );
	}
	
	
	public function order( Request $request ) {
		
		
		foreach ( Cart::content() as $id => $item ) {
			
			$prod = Product::find( $item->id );//вызываем товар по id
			
			$order = Order::create( [
				
				'tovar_name'  => $prod->title,
				'tovar_price' => $prod->price,
				'tovar_id'    => $prod->id,
				'status'      => 'Ожидает',
				'user_id'     => Auth::user()->id,
				'shop_id'     => $prod->shop_id,
				'is_cache'    => $request->input( 'is_cache' ) ? 1 : 0,
				'qty'         => $item->qty,
				'article'     => $prod->article,
				'batch'       => $prod->batch,
				'sklad'       => $prod->sklad,
			
			
			] );
			
			if ( $order->save() ) {
				$prod      = Product::find( $prod->id );
				$prod->qty = $prod->qty - $item->qty;
				$prod->save();
			}
		};
		
		Cart::destroy();
		
		return redirect( '/orders' );
	}
	
}
