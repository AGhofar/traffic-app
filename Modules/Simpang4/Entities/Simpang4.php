<?php

namespace Modules\Simpang4\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Simpang4 extends Model
{
    use HasFactory;

    protected $connection = 'mongodb_simpang4';
    protected $collection = 'Simpang4';

    protected $fillable = [
        'nama_simpang',
        'jalan_utara', 'jalan_timur', 'jalan_selatan', 'jalan_barat',
        'tipe_ekuivalen', 'mc', 'lv', 'hv',

    ];
    
    protected static function newFactory()
    {
        return \Modules\Simpang4\Database\factories\Simpang4Factory::new();
    }
}
