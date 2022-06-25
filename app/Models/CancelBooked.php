<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelBooked extends Model
{
    use HasFactory;
    public $table = 'cancel_booked';

    protected $fillable = [
        'reservation_id',
        'payment_type',
        'name',
        'mobile_number',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
