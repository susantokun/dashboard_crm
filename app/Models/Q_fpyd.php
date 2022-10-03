<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_fpyd extends Model
{
    use HasFactory;

    protected $table      = 'q_fpyd';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'ob_hrga', 'no_coun', 'no_obhr'];

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
