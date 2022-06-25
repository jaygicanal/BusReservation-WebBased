<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    public $table = 'refund';

    protected $fillable = [
        'cancel_id',
        'payment_refund_ss',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
