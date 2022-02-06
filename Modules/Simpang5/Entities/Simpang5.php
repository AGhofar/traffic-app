<?php

namespace Modules\Simpang5\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Simpang5 extends Model
{
    use HasFactory;

    protected $connection = 'mongodb_simpang5';
    protected $collection = 'Simpang5';

    protected $fillable = [
        'nama_simpang', 'jalan_utara', 'jalan_timur', 'jalan_selatan', 'jalan_barat', 'jalan_barat_laut', 'tipe_ekuivalen', 'mc', 'lv', 'hv'
    ];

    
    protected static function newFactory()
    {
        return \Modules\Simpang5\Database\factories\Simpang5Factory::new();
    }
}
