<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Q_sord extends Model
{
    use HasFactory;

    protected $table      = 'q_sord';
    protected $primaryKey = ['kd_prsh', 'kd_kprd', 'tx_tahn', 'kd_sord', 'no_sord'];

    protected $guarded = [];

    // protected $hidden = [
    //     'created_by',
    //     'updated_by',
    //     'created_at',
    //     'updated_at',
    // ];

    public $incrementing = false;
    public $timestamp = false;

    public function m_matr()
    {
        return $this->belongsTo(M_matr::class, 'kd_matr', 'kd_matr');
    }
}
