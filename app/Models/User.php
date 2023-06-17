<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'user_phone',
        'user_address',
        'user_image',
        'email',
        'password',
        'is_email_verified'
    ];

    public function userVerify()
    {
        return $this->hasOne(UserVerify::class,'user_id');
    }

    public function NgoTypeAndLanguage()
    {
        return $this->hasOne(NgoTypeAndLanguage::class,'user_id');
    }

    public function FdOneForm()
    {
        return $this->hasOne(FdOneForm::class,'user_id');
    }




    public function ngoRenewInfo()
    {
        return $this->hasMany(NgoRenewInfo::class,'user_id');
    }

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
    ];
}
