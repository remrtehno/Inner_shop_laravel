<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shops;

class Order extends Model {
   
	 protected $fillable = ['user_id','article','batch','comment','buy_price','tovar_id','shop_id', 'is_cache','tovar_price', 'tovar_name', 'status', 'qty', 'sklad'];

	 public function getShop() {
	 	if(Shops::find($this->shop_id)) {
		  return Shops::find( $this->shop_id )->title;
	  } else {
	 		return 'Неуказано';
	  }
	 }

	 public function getStatus() {
	 	if($this->status == 'Ожидает') {
			return $this->status;
	 	}
	 	if($this->status) {
	 		return 'Отправлено';
	 	} else {
	 		return 'Возвращен';
	 	}
	}
}
