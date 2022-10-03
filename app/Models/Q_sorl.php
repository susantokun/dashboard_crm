<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_sorl extends Model
{
    use HasFactory;

    protected $table      = 'q_sorl';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'kd_sord'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
