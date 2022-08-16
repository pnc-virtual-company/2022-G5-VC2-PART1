<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'cause',
        'status',
        'student_id',
        'admin_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function student(){
        return $this->hasMany(student::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
