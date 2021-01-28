<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnedProducts extends Model
{
    //
	 protected  $table = "product_returned";
	  protected $fillable = ['product_id','shop_id','text', 'qty'];
	 
}
