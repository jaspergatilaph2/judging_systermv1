<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{

    protected $fillable = [
        'student_id',
        'user_id',
        'student_name',
        'contest_category',
        'contest_type',
        'group_team',
        'duo_name'
    ];

    protected $table = 'participants';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
