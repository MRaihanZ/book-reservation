<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'reservation_date',
        'due_date',
        'returned_at',
        'approved_by',
        'approved_at',
        'notes',
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'due_date' => 'date',
        'returned_at' => 'date',
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function approver()
    {
        return $this->belongsTo(
            User::class,
            'approved_by'
        );
    }
}
