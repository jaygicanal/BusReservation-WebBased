<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecasting extends Model
{
    use HasFactory;
    public $table = 'forecasting';

    protected $fillable = [
        'forecast_type',
        'total_value',
        'month_forecast',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
    ];
}
