<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function approvedReservations()
    {
        return $this->hasMany(
            Reservation::class,
            'approved_by'
        );
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }
}
