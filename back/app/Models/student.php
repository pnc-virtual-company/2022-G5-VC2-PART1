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

   

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
