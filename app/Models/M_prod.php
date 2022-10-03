<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_prod extends Model
{
    use HasFactory;

    protected $table      = 'm_prod';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tp_prod', 'kd_rutp', 'kd_prod'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
