<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $fillable = [
        'student_id',
        'student_class_id',
    ];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function class():BelongsTo
    {
        return $this->belongsTo(StudentClass::class,'student_class_id');
    }

}
