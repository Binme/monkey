<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

	protected $fillable = [
        'title', 'href'
    ];

    public function Menu_details(){
    	return $this->hasMany('App/Menu_detail','menu_id','id');
    }
}
