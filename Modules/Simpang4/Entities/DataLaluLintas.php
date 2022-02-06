<?php

namespace Modules\Simpang4\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataLaluLintas extends Model
{
    use HasFactory;
    protected $connection = 'mongodb_simpang4';
    protected $collection = 'DataLaluLintas';

    protected $fillable = [
        'tgl_survei', 'id_simpang',
        'utara_RT', 'utara_ST', 'utara_LT',
        'timur_RT', 'timur_ST', 'timur_LT',
        'selatan_RT', 'selatan_ST', 'selatan_LT',
        'barat_RT', 'barat_ST', 'barat_LT'];
    
    protected static function newFactory()
    {
        return \Modules\Simpang4\Database\factories\DataLaluLintasFactory::new();
    }
}
