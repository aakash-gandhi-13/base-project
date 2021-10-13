<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessControl extends Model
{
    use HasFactory;

    protected $fillable = ['screen_id', 'access_type', 'access_id', 'can_access', 
                        'created_at', 'updated_at'];

    const TYPE_USER = "USER";
    const TYPE_USER_ROLE = "USER ROLE";
}
