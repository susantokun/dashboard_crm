<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_sors extends Model
{
    use HasFactory;

    protected $table      = 'q_sors';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'kd_stra', 'ob_stra', 'no_stra'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
