<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_fpyh extends Model
{
    use HasFactory;

    protected $table      = 'q_fpyh';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'kd_paid'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
