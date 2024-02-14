<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produk';
    protected $table = 'produk';
    protected $guarded = [];


    public function kategori() {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
    public function foto_produk() {
        return $this->hasMany(foto_produk::class, 'id_produk', 'id_produk');
    }

}
