<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class student extends Authenticatable
{
    use HasApiTokens,Notifiable;
    protected $fillable=[
        'first_name',
        'last_name',
        'gender',
        'email',
        'batch',
        'email',
        'phone',
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
