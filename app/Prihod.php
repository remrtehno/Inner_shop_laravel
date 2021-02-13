<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prihod extends Model
{
	protected $table = "prihod";
	protected $fillable = [
		'article',
		'batch',
		'is_sample',
		'qty',
		'sklad',
		'rozn_price',
		'supplier',
		'zakup_price',
	];
	
	public static function add( $fields ) {
		$post = new static;
		$post->fill( $fields );
		$post->save();
		
		return $post;
	}
}
