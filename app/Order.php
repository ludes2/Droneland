<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'cart',
        'address',
        'name',
        'payment_id'
    ];

    // one-to-many relationship; each Order belongs to one User
    public function user(){
        return $this->belongsTo('App\User');
    }
}
