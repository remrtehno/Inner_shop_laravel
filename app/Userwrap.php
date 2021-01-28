<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userwrap extends Model
{
    protected $table = "userwrap";
    protected $fillable = ['title','anonce'];


    public static function getUserWrap(){
        $userwrap =  self::all();
        return $userwrap;
    }
}
