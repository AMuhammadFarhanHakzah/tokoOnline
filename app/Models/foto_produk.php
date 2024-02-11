<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto_produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_foto_produk';
    protected $table = 'foto_produk';
    protected $guarded = [];
    

    public function produk() {
        return $this->belongsTo(produk::class, 'id_foto_produk');
    }
}
