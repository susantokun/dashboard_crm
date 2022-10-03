<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\U_userFlStatus;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class U_user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table      = 'u_user';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kd_prsh',
        'kd_kprd',
        'identifier',
        'name',
        'email',
        'password',
        'phone',
        'picture',
        'fl_stat',
        'last_login_at',
        'last_login_ip',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'fl_stat' => U_userFlStatus::class,
    ];

    public function unverify()
    {
        $this->email_verified_at = null;
        $this->save();
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
            'fl_stat' => U_userFlStatus::ACTIVE,
        ])->save();
    }

    public function createdBy(): Attribute
    {
        return Attribute::get(fn ($value) => isset(U_user::find($value)->identifier) ? U_user::find($value)->identifier : null);
    }

    public function updatedBy(): Attribute
    {
        return Attribute::get(fn ($value) => isset(U_user::find($value)->identifier) ? U_user::find($value)->identifier : null);
    }

    public function deletedBy(): Attribute
    {
        return Attribute::get(fn ($value) => isset(U_user::find($value)->identifier) ? U_user::find($value)->identifier : null);
    }

    public function identifier(): Attribute
    {
        return new Attribute(
            fn ($value) => str($value)->lower(),
            fn ($value) => str($value)->lower(),
        );
    }
}
