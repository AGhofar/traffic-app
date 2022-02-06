<?php

namespace Modules\Simpang5\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataLaluLintas extends Model
{
    use HasFactory;

    protected $connection = 'mongodb_simpang5';
    protected $collection = 'DataLaluLintas';

    protected $fillable = [
        'tgl_survei', 'id_simpang',
        'utara_RT1', 'utara_RT2', 'utara_ST', 'utara_LT',
        'timur_RT', 'timur_ST1', 'timur_ST2', 'timur_LT',
        'selatan_RT', 'selatan_ST1', 'selatan_ST2', 'selatan_LT',
        'barat_RT', 'barat_ST', 'barat_LT2', 'barat_LT2',
        'barat_laut_RT', 'barat_laut_ST1', 'barat_laut_ST2', 'barat_laut_LT'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Simpang5\Database\factories\DataLaluLintasFactory::new();
    }
}
