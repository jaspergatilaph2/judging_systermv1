<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{

    protected $fillable = [
        'student_id', 'student_name', 'contest_category', 'contest_type'
    ];

    protected $table= 'participants';
    use HasFactory;
}
