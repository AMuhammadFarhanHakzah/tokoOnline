<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_order';
    protected $table = 'order';
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(cart::class, 'id_cart');
    }
}
