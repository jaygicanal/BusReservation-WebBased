<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routing extends Model
{
    use HasFactory;
    public $table = 'routings';

    /* protected $casts = [ 
        'route_category' => 'array', 
    ]; */

    protected $fillable = [
        'route_category' => 'array',
        'place',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
