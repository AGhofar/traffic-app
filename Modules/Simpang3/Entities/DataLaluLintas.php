<?php

namespace Modules\Simpang3\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataLaluLintas extends Model
{
    use HasFactory;

    protected $connection = 'mongodb_simpang3';
	protected $collection = 'DataLaluLintas';

    protected $fillable = [
        'tgl_survei','id_simpang','utara_ST','utara_LT','timur_RT','timur_LT','selatan_RT','selatan_ST'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Simpang3\Database\factories\DataLaluLintasFactory::new();
    }
}
