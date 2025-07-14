<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{

    protected $fillable = [
        'judge_id',
        'participant_id',
        'criteria_id',
        'score',
    ];

    public function judge()
    {
        return $this->belongsTo(User::class, 'judge_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participants::class);
    }

    public function criterion()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }

    public function judges()
    {
        return $this->belongsTo(Judges::class, 'judge_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }
    use HasFactory;
}
