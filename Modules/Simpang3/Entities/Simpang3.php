<?php

namespace Modules\Simpang3\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Simpang3 extends Model
{
    use HasFactory;

    protected $connection = 'mongodb_simpang3';
	protected $collection = 'Simpang3';

    protected $fillable = [
        'nama_simpang', 'jalan_utara','jalan_timur','jalan_selatan','tipe_ekuivalen','mc','lv','hv'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Simpang3\Database\factories\Simpang3Factory::new();
    }
}
