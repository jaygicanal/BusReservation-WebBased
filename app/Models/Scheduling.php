<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;
    public $table = 'scheduling';

    protected $fillable = [
        'trans_id',
        'origin',
        'destination',
        'bus_schedule',
        'departure_time',
        'bus_class',
        'with_wifi',
        'with_tv',
        'fare',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

}
