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

    public function cartdetail() {
        return $this->hasMany(cartdetail::class, 'id_cart', 'id_cart');
    }

    public function updatetotal($itemcart, $operator, $subtotal) {
        if($operator == '+') {
            $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
        } else {
            $this->attributes['subtotal'] = $itemcart->subtotal - $subtotal;
        }
        if($operator == '+') {
            $this->attributes['total'] = $itemcart->total + $subtotal;
        } else{
            $this->attributes['total'] = $itemcart->total - $subtotal;
        }

    }
}
