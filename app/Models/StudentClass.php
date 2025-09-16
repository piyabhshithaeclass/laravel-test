<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $fillable = [
        'grade',
        'subject',
        'teacher',
        'start_date',
        'time',
        'end_date',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'student_class_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'subscriptions');
    }
}
