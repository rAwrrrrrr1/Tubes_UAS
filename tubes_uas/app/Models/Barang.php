<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    /**
    * fillable
    *
    * @var array
    */
    protected $fillable = [
    'nama_barang',
    'nama_kategori',
    'jumlah_barang',
    'harga_barang',
    ]; 
}
