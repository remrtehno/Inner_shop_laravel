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
use App\Order;
use Auth;
use App\ReturnedProducts;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;




class MainController extends Controller {
	public function index() {
		
		$slider       = Slider::getSlider();
		$userwrap     = []; // Product::all()->random(3);
		$about        = [];//About::getAbout();
		$gallery      = [];//Gallery::limit(8)->get();
		$news         = [];// News::getNews();
		$products     = Product::limit( 6 )->get();
		$video        = []; //Video::limit(8)->get();
		$product_cats = ProdCat::all();
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		
		return view( "index.index", compact( 'slider', 'product_cats', 'userwrap', 'about', 'gallery', 'news', 'products', 'video',
			'title', 'meta_key', 'meta_desc', 'ooo' ) );
		
		
	}
	
	
	public function products() {
		
		$products = Product::getProducts();
		$cat      = ProdCat::getCategory();
		
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		return view( "products.index", compact( 'products', 'cat', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	public function category( $slug ) {
		
		$id = ProdCat::where( 'slug', $slug )->firstOrFail();
		
		$products = Product::where( 'cat_id', $id->id )->paginate( 1 );
		
		$cat       = ProdCat::getCategory();
		$title     = "$id->title";
		$meta_desc = "$id->meta_desc";
		$meta_key  = "$id->meta_key";
		
		return view( "products.category", compact( 'products', 'cat', 'title', 'meta_key', 'meta_desc', 'id' ) );
	}
	
	public function detail( $slug ) {
		
		$product = Product::where( 'slug', $slug )->firstOrFail();
		
		
		$title     = "$product->title";
		$meta_desc = "$product->meta_desc";
		$meta_key  = "$product->meta_key";
		
		return view( "products.detail", compact( 'product', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	
	public function newsdetail( $slug ) {
		
		$news = News::where( 'slug', $slug )->firstOrFail();
		
		
		$order   = News::orderBy( 'created_at', 'desc' )->take( 3 )->get();
		$gallery = Gallery::limit( 9 )->get();
		
		
		$title     = "$news->title";
		$meta_desc = "$news->meta_desc";
		$meta_key  = "$news->meta_key";
		
		
		return view( "news.detail", compact( 'news', 'order', 'gallery', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	public function gallery() {
		
		$gall = Gallery::all();
		$cat  = ProdCat::getCategory();
		
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		
		return view( "gallery.index", compact( 'gall', 'cat', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	public function news() {
		
		$news    = News::all();
		$order   = News::orderBy( 'created_at', 'desc' )->take( 3 )->get();
		$gallery = Gallery::limit( 9 )->get();
		
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		
		return view( "news.index", compact( 'news', 'order', 'gallery', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	public function about() {
		
		$about = About::getAbout();
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		
		return view( "about.index", compact( 'about', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	public function video() {
		
		$video = Video::all();
		
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		
		return view( "video.index", compact( 'video', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	public function contact() {
		
		$contact = Contact::all();
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		return view( "contact.index", compact( 'contact', 'title', 'meta_key', 'meta_desc' ) );
	}
	
	
	
	public function orders() {
		$user   = Auth::user();
		$orders = Order::where( 'user_id', '=', $user->id )->get();
		
		$title     = "";
		$meta_desc = "";
		$meta_key  = "";
		
		return view( "orders.index", compact( 'title', 'meta_key', 'meta_desc', 'user', 'orders', 'products' ) );
	}
	
	public function returnOrder($id) {
	
		
		$user = Auth::user();
		
		$order = Order::where('id', '=', $id)->where( 'user_id', '=', $user->id )->first();

		$product = Product::find($order->tovar_id);
		$product->qty =  $product->qty + $order->qty;
		$product->save();
	
		
		ReturnedProducts::create([
			'product_id' => $order->tovar_id,
			'shop_id' => $order->shop_id,
			'qty' => $order->qty,
			'text' => "Вернул магазин $user->name",
		]);


		$order->is_returned = 1;
		$order->status = 0;
		$order->is_text = "Вернул магазин $user->name";
		$order->save();
		
		
		return redirect(route('orders'));

		
		
		
		
		
		
	}
	
	
}
