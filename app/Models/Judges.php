<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judges extends Model
{
    protected $fillable = [
        'name',
        'organization',
        'email',
        'phone',
        'password',
        'image',
    ];

    protected $table = 'judges';
    use HasFactory;
}
