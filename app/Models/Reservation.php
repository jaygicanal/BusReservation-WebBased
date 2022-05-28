<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $table = 'reservations';

    protected $fillable = [
        'reservation_id',
        'user_id',
        'trans_id',
        'origin',
        'destination',
        'departure_date',
        'seat_no',
        'total_fare',
        'payment_type',
        'payment_ss',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
