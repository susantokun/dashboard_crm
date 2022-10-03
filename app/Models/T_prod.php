<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class T_prod extends Model
{
    use HasFactory;

    protected $table      = 't_prod';
    protected $primaryKey = ['kd_prsh', 'tp_prod', 'tp_doku'];
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
