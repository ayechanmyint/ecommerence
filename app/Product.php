<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // public function cart_items(){
    // 	return $this->hasOne('App\Cartitem');
    // }
}
