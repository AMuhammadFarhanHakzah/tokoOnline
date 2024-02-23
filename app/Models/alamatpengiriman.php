<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamatpengiriman extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_alamat_pengiriman';
    protected $table = 'alamat_pengiriman';
    protected $guarded = [];

    public function User() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cart() {
        return $this->belongsTo(cart::class, 'id_cart');
    }
}
