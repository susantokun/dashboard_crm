<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_ksla extends Model
{
    use HasFactory;

    protected $table      = 'm_ksla';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'kd_ksla'];
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
