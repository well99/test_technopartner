<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id_kategori'];

    function transaksi()
    {
        return $this->hasMany(Transaksi::class);
        // return $this->belongsTo(Transaksi::class);
    }
}
