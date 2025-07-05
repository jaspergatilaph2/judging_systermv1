<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{

    protected $fillable = [
        'eventsName',
        'description',
        'date',
        'time',
        'endtime',
        'eventsText',
    ];

    protected $table = 'events';
    use HasFactory;
}
