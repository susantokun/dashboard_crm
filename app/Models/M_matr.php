<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_matr extends Model
{
    use HasFactory;

    protected $table      = 'm_matr';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tp_matr', 'kd_matr'];
    protected $keyType    = 'string';

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
