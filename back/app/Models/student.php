<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'email',
        'password',
        'class',
        'profile_image',
        'admin_id'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function leave(){
        return $this->hasMany(leave::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
