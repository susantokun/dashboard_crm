<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_stat extends Model
{
    use HasFactory;

    protected $table      = 'm_stat';
    protected $primaryKey = ['kd_prsh', 'tp_stat', 'kd_stat'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
