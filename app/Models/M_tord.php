<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_tord extends Model
{
    use HasFactory;

    protected $table      = 'm_tord';
    protected $primaryKey = ['kd_prsh', 'kd_tord', 'tp_doku', 'tp_orda'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
