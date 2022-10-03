<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_sorb extends Model
{
    use HasFactory;

    protected $table      = 'q_sorb';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'kd_bill', 'tp_bill'];

    protected $guarded = [];

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
}
