<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_stra extends Model
{
    use HasFactory;

    protected $table      = 'm_stra';
    protected $primaryKey = ['kd_prsh', 'kd_stra'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
