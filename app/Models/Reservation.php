<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', // Add any other fields that you want to allow for mass assignment
        'email',
        'phone',
        'no_of_guest',
        'date',
        'time',
        'message',
        'status'
        // ... other fields
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i'
    ];
    // ... other model code
}
