<?php

namespace Modules\Simpang5\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DefaultTimeImport extends Model
{
    use HasFactory;

    protected $connection = 'mongodb_simpang5';
	protected $collection = 'DefaultTimeImport';

    protected $fillable = [
        'jam_awal', 'jam_akhir'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Simpang5\Database\factories\DefaultTimeImportFactory::new();
    }
}
