<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_farh extends Model
{
    use HasFactory;

    protected $table      = 'q_farh';
    protected $primaryKey = ['kd_prsh', 'kd_fcoa', 'tp_paid', 'tx_tahn', 'kd_paid'];

    protected $guarded = [];

    public $incrementing = false;

    public function t_paid()
    {
        return $this->belongsTo(T_paid::class, 'tp_paid', 'tp_paid');
    }
}
