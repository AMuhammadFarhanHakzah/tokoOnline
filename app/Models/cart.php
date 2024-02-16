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
}
