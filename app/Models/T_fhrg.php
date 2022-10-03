<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class T_fhrg extends Model
{
    use HasFactory;

    protected $table      = 't_fhrg';
    protected $primaryKey = ['kd_prsh', 'tp_fhrg'];
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
