<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'password',
        'class',
        'age',
        'profile_image',
        'admin_id',
    ];

    public function Admin(){
        return $this->belongsTo(student::class);
    }

    public function leave(){
        return $this->hasMany(leave::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
