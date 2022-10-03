<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_ksls extends Model
{
    use HasFactory;

    protected $table      = 'm_ksls';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'kd_ksla', 'kd_ksls'];
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
