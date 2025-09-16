<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'nic_number',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function classes()
    {
        return $this->belongsToMany(StudentClass::class, 'subscriptions');
    }

}
