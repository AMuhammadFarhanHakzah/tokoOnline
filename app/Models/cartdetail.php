<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartdetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cart_detail';
    protected $table = 'cart_detail';
    protected $guarded = [];

    public function cart() {
        return $this->belongsTo(cart::class, 'id_cart');
    }

    public function produk() {
        return $this->belongsTo(produk::class, 'id_produk');
    }

    public function updateDetail($itemDetail, $operator, $qty, $harga){
        if($operator == '+') {
            $this->attributes['qty'] = $itemDetail->qty + $qty;
        } else {
            $this->attributes['qty'] = $itemDetail->qty - $qty;
        }

        if($operator == '+') {
            $this->attributes['subtotal'] = $itemDetail->subtotal + $harga;
        } else {
            $this->attributes['subtotal'] = $itemDetail->subtotal - $harga;
        } 
        
        self::save();
    }

}
