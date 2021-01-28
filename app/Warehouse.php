<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
	protected $fillable = ['title','phone', 'address'];
	
	
	
	public static function add($fields)
	{
		$post = new static;
		$post->fill($fields);
		$post->save();
		return $post;
	}
	
	
	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}
	
	
	
}
