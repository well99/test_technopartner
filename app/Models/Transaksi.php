<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'id_kategori',
        'tipe_transaksi',
        'nominal',
        'deskripsi'
    ];

    protected $guarded = ['id_transaksi'];

    function kategori()
    {
        // return $this->hasMany(Kategori::class);
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
