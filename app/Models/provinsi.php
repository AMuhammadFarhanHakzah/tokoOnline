<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_provinsi';
    protected $table = 'provinsi';
    protected $guarded = [];

    
}
