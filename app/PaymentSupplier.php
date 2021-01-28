<?php

namespace App;

use App\suppliers;
use Illuminate\Database\Eloquent\Model;

class PaymentSupplier extends Model
{
    		protected  $table = "payment_suppliers";
		protected $fillable =['supplier_id', 'dollar_rate', 'usd', 'cash', 'terminal'];

		 public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();
        return $post;
    }

  public function getSupplier() {
	 	return suppliers::find($this->supplier_id)->name;
	}


    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
