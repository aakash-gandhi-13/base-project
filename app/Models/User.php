<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'user_role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'email_verified_at'
    ];

    public function userAccessToken()
    {
        return $this->hasOne(UserAccessToken::class);
    }

    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }
    
    public function screens()
    {
        return $this->hasMany(Screen::class);
    }

    protected function rules($unique=false)
    {
        return collect([
            'first_name' => 'required|string|max:15',
            'last_name' => 'required|string|max:15',
            'email' => 'required|string|email'. (($unique)? "|unique:users" : ''),
            'phone' => 'required|integer|unique:users',
            'password'  => 'required',
            'user_role_id' => 'required|integer'
        ]);
    }
}
