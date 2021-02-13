<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Shops extends Model {
	
	use Sluggable;
	protected $table = "shops";
	protected $fillable = [ 'title', 'anonce', 'user_id' ];
	
	public function orders() {
		return Order::where( 'shop_id', $this->id )->get();
	}
	
	public function ordersWait() {
		return Order::where( 'shop_id', $this->id )->where( 'status', 'Ожидает' )->get();
	}
	
	public function getStatisticsForAll() {
		return DB::select( 'select COUNT(*) as cnt,
															 SUM(tovar_price) as price
															 from orders
															 where status = 1');
	}
	public function getMonthStatisticsForAll() {
		return DB::select( 'select COUNT(*) as cnt,
															 SUM(tovar_price) as price
															 from orders
															 where status = 1
															 and created_at >= ?
															 ',
			[Carbon::now()->subdays(30) ] );
	}
	
	public function getDayStatisticsForAll() {
		return DB::select( 'select COUNT(*) as cnt,
															 SUM(tovar_price) as price
															 from orders
															 where status = 1
															 and created_at >= ?
															 ',
			[Carbon::now()->subdays(1) ] );
	}
	
	public function monthStatistics() {
		return DB::select( 'select COUNT(*) as cnt,
															 SUM(tovar_price) as price
															 from orders
															 where shop_id = ? and status = 1
															 and created_at >= ?
															 ',
			[ $this->id, Carbon::now()->subdays(30) ] );
	}
	
	public function statistics() {
		return DB::select( 'select COUNT(*) as cnt,
															 SUM(tovar_price) as price
															 from orders
															 where shop_id = ? and status = 1',
			[ $this->id ] );
	}
	
	public function statistics_warehouse() {
		return DB::select( 'SELECT sklad,
															 COUNT(*) as cnt,
															 SUM(tovar_price) as sum,
															 SUM(buy_price) as buySum
															 FROM orders
															 WHERE shop_id = ? AND status = 1
															 GROUP BY sklad',
			[ $this->id ] );
	}
	
	public function statisticsByDate( $fromDate, $toDate ) {
		
		$from = Carbon::parse( $fromDate )
		              ->startOfDay()
		              ->toDateTimeString();
		
		$to = Carbon::parse( $toDate )
		            ->endOfDay()
		            ->toDateTimeString();
		
		if ( $fromDate || $toDate ) {
			return DB::select( 'select COUNT(*) as cnt, SUM(tovar_price) as price from orders where shop_id = ? and status = 1 and created_at BETWEEN ? AND ?', [
				$this->id,
				$from,
				$to
			] );
		}
		
		return DB::select( 'select COUNT(*) as cnt, SUM(tovar_price) as price from orders where shop_id = ? and status = 1 and created_at > ?', [
			$this->id,
			Carbon::today()->toDateTimeString()
		] );
		
	}
	
	public function products() {
		
		return $this->belongsTo( "App\Product", 'id', 'shop_id' );
	}
	
	public function getProducts( $id ) {
		$cat = Product::where( 'shop_id', $id )->get();
		
		return $cat;
	}
	
	
	public static function add( $fields ) {
		$post = new static;
		$post->fill( $fields );
		$post->save();
		
		return $post;
	}
	
	public function edit( $fields ) {
		$this->fill( $fields );
		$this->save();
	}
	
	
	public function sluggable(): array {
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}
}
