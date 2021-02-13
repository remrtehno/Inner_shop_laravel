<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
		public function edit($fields) {
			$this->fill($fields);
			$this->save();
		}
		
		public function get_shop_by_user_iD() {
			$shop_id = Shops::select()->where('user_id', $this->id)->first();
			if(is_null($shop_id)) {
				Session::flash('alert','Сначала вам надо указать ваш магазин');
				return ;
			}
			return $shop_id->id;
		}
}
