<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'publisher',
        'category',
        'publish_year',
        'description',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function activeReservation()
    {
        return $this->hasOne(Reservation::class)
            ->where('status', 'disetujui');
    }
}
