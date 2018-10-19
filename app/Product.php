<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'thumbnail',
        'title',
        'short_description',
        'full_description',
        'price',
        'category',
        'pictures'
    ];

    public function pictures(){
        return $this->hasMany('App\Picture');
    }
}
