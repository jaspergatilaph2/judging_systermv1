<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $fillable = [
        'user_id',
        'contestant_id',
        'contest_category',
    ];
    use HasFactory;
}
