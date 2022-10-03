<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class U_menu extends Model
{
    use HasFactory;

    protected $table      = 'u_menu';
    protected $primaryKey = 'id';

    protected $guarded = [];

    protected $hidden = [
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function childs()
    {
        return $this->hasMany(U_menu::class, 'parent_id', 'id');
    }
}
