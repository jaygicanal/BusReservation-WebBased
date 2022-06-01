<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $table = 'reservations';

    protected  $primaryKey = 'reservation_id';
    public $incrementing = false;

    protected $fillable = [
        'reservation_id',
        'user_id',
        'trans_id',
        'origin',
        'destination',
        'departure_date',
        'departure_time',
        'seat_no',
        'total_fare',
        'payment_type',
        'payment_ss',
        'status',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
