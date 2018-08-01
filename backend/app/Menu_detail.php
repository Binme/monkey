<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_detail extends Model
{
	protected $fillable = [
        'title', 'href','menu_id'
    ];

    public function Menus(){
    	return $this->belongsTo('App/Menu','menu_id','id');
    }
}
