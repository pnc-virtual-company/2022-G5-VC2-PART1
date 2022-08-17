<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    use HasFactory;
    protected $fillable=[
        'type',
        'start_time',
        'start_date',
        'end_time',
        'end_date',
        'cause',
        'status',
        'admin_id',
        'student_id'
    ];

    public function student(){
        return $this->belongsTo(student::class);
    }

    public function Admin(){
        return $this->belongsTo(Admin::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
