<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware( [ 'auth', "IsShop" ] )->group( function () {
	
	
	Route::get( '/', "MainController@index" )->name( "index" );
	Route::get( '/products', "MainController@products" )->name( "products" );
	Route::get( '/category/{slug}', "MainController@category" )->name( "category" );
	Route::get( '/detail/{slug}', "MainController@detail" )->name( "detail" );
	Route::get( '/cart', 'Cart2@index' )->name( 'cart' );
	Route::get( '/add/{product}', 'Cart2@addToCart' )->name( 'add' );
	Route::get( '/remove/{productId}', 'Cart2@removeProductFromCart' )->name( 'remove' );
	Route::get( '/checkout', 'Cart2@order' )->name( 'checkout' );
	Route::get( '/orders', "MainController@orders" )->name( 'orders' );
	Route::get( '/return-order/{id}', "MainController@returnOrder" )->name( 'return-order' );
	Route::resource( '/basket', "Cart2" );
	
	
} );


Route::group( [
	'prefix'     => 'admin',
	'namespace'  => 'Admin',
	'middleware' => [ 'auth', 'AdminMiddleware' ]
], function () {
	
	Route::get( '/', 'MainController@index' );
	Route::resource( '/income', 'IncomeController' );
	Route::resource( '/orders', 'OrdersController' );
	Route::get( '/orders-status', 'OrdersController@cahngeStatus' )->name( 'cahngeStatus' );
	Route::post( '/orders-return', 'OrdersController@returnProduct' )->name( 'returnProduct' );
	Route::resource( '/post', 'ProductController' );
	Route::resource( '/category', 'CategoryController' );
	Route::resource( '/slider', 'SliderController' );
	Route::resource( '/gallery', 'GalleryController' );
	Route::resource( '/about', 'AboutController' );
	Route::resource( '/news', 'NewsController' );
	Route::post( '/news/create-user', 'NewsController@userCreate' )->name( 'create-user' );
	Route::resource( '/video', 'VideoController' );
	Route::resource( '/contact', 'ContactController' );
	Route::resource( '/logo', 'LogoController' );
	Route::resource( '/shops', 'ShopsController' );
	Route::resource( '/statisics', 'StatisticsController' );
	Route::resource( '/payments-shop', 'PaymentShopController' );
	Route::resource( '/payments-supplier', 'PaymentSupplierController' );
	Route::resource( '/suppliers', 'SuppliersController' );
	Route::resource( '/samples', 'SamplesController' );
	Route::resource( '/warehouse', 'WarehouseController' );
	Route::resource( '/prihod', 'PrihodController' );
	
	Route::get( '/prihod-date', 'PrihodController@filter_by_date' )->name('prihod_by_date');
	
	Route::resource( '/kassa', 'KassaController' );
	
	Route::get( 'return-supplier', "ReturnedProductsController@return" )->name( 'returnSupplier' );
	Route::get( 'return-shop', "ReturnedProductsController@return_shop" )->name( 'return_shop' );
	
} );

Auth::routes();

Route::get( '/home', 'HomeController@index' )->name( 'home' );
