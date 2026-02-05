<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Course extends Model
{
    //
 use HasFactory, Notifiable;

 protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'user_id',
    ];

    public function isInstructor()
{
    return $this->role === 'instructor';
}

    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

        public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }

    public function modules()
{
    return $this->hasMany(Module::class);
}

}
