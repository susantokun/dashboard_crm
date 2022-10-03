<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_rutp extends Model
{
    use HasFactory;

    protected $table      = 'm_rutp';
    protected $primaryKey = ['kd_prsh', 'tp_rutp', 'kd_rutp'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
