<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_sorh extends Model
{
    use HasFactory;

    protected $table      = 'q_sorh';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'kd_prod', 'tp_sord'];

    protected $guarded = [];

    protected $hidden = [];

    public $incrementing = false;
    public $timestamp = false;

    public function scopeWhereKdPrsh($query)
    {
        return $query->where('kd_prsh', auth()->user()->kd_prsh);
    }

    public function m_mtra()
    {
        return $this->belongsTo(M_mtra::class, 'kd_cust', 'kd_mtra');
    }

    public function t_sord()
    {
        return $this->belongsTo(T_sord::class, 'tp_sord', 'tp_sord');
    }
}
