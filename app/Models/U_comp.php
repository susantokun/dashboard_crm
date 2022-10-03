<?php

namespace App\Models;

use App\Enums\GlobalFlStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class U_comp extends Model
{
    use HasFactory;

    protected $table      = 'u_comp';
    protected $primaryKey = 'id';

    protected $guarded = [];

    protected $casts = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'fl_stat' => GlobalFlStatus::class,
    ];

    public function scopeWhereKdPrsh($query)
    {
        return $query->where('kd_prsh', auth()->user()->kd_prsh);
    }

    public function scopeWhereActive($query)
    {
        return $query->where('fl_stat', GlobalFlStatus::ACTIVE);
    }
}
