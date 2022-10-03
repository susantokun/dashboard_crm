<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_kprd extends Model
{
    use HasFactory;

    protected $table      = 'm_kprd';
    protected $primaryKey = 'kd_kprd';
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
