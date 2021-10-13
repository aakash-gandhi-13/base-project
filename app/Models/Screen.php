<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    protected $fillable = ['screen_name_en', 'screen_name_jp', 'parent_id', 'screen_slug', 
    'user_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accessControls()
    {
        return $this->hasMany(AccessControl::class);
    }

    protected function rules() {
        return collect([
        'screen_name_en' => 'required|string|max:20',
        'screen_name_jp' => 'required|string|max:40',
        'parent_id' => 'required|integer',
        'screen_slug' => 'required|string',
        'parent_id' => 'required|integer'
        ]);
    }
}
