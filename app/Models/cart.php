<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cart';
    protected $table = 'cart';
    protected $guarded = [];


    public function User(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cartdetail() {
        return $this->hasMany(cartdetail::class, 'id_cart', 'id_cart');
    }

    public function updateTotal($itemCart, $operator, $subtotal) {
        if($operator == '+') {
            $this->attributes['subtotal'] = $itemCart->subtotal + $subtotal;
        } else {
            $this->attributes['subtotal'] = $itemCart->subtotal - $subtotal;
        }
        if($operator == '+') {
            $this->attributes['total'] = $itemCart->total + $subtotal;
        } else{
            $this->attributes['total'] = $itemCart->total - $subtotal;
        }
        self::save();
    }
}
