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

}
