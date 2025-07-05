<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Judges extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'email',
        'phone',
        'password',
        'image',
    ];

    protected $table = 'judges';
    public $timestamps = false; 
}