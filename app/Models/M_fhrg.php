<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_fhrg extends Model
{
    use HasFactory;

    protected $table      = 'm_fhrg';
    protected $primaryKey = ['kd_prsh', 'kd_fhrg'];
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
