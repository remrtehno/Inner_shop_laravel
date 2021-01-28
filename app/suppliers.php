<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    //
			protected $fillable =['name', 'phone', 'address', 'text'];

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
