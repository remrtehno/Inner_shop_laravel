<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
	protected  $table = "incomes";
	protected $fillable =['article','batch','purchase','retail_price','warehouse','provider','is_returned'];
}
