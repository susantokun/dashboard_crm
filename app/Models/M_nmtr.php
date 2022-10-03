<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_nmtr extends Model
{
    use HasFactory;

    protected $table      = 'm_nmtr';
    protected $primaryKey = ['kd_prsh', 'gr_mtra', 'nl_kini'];
    protected $keyType    = 'string';

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
}
