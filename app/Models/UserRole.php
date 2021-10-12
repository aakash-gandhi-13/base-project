<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = ['type_name_en', 'type_name_jp', 'nice_name', 'is_active'];

    protected function rules() {
            return collect([
                'type_name_en' => 'required|string|max:20',
                'type_name_jp' => 'required|string|max:40',
                'nice_name' => 'required|string|unique:user_roles|max:20',
                'is_active' => 'required|boolean'
            ]);
    }
}
