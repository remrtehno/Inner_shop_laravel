<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentShop extends Model
{
		protected  $table = "payment_shops";
		protected $fillable =['shop_id', 'dollar_rate', 'usd', 'cash', 'terminal'];

		 public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();
        return $post;
    }

  public function getShop() {
	 	return Shops::find($this->shop_id)->title;
	}


    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
