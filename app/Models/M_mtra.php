<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_mtra extends Model
{
    use HasFactory;

    protected $table      = 'm_mtra';
    protected $primaryKey = ['kd_prsh', 'kd_mtra', 'gr_mtra', 'tp_mtra'];
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
