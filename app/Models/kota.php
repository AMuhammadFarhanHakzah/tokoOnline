<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_kota';
    protected $table = 'kota';
    protected $guarded = [];
}
