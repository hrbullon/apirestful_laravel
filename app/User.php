<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED_USER = '1';
    const NOT_VERIFIED_USER = '0';

    const ADMINISTRATOR_USER = 'true';
    const REGULAR_USER = 'false';

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * If User is verified
     *
     * @return Boolean
     */
    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    /**
     * If User is administrator
     *
     * @return Boolean
     */
    public function isAdministrator()
    {
        return $this->admin == User::ADMINISTRATOR_USER;
    }

    /**
     * Generate a random token
     *
     * @return String
     */
    public static function generateVerificationToken()
    {
        return str_random(40);
    }
}
