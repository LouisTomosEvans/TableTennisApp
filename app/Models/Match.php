<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongstoMany(User::class, 'match_user', 'matchid', 'userid')->withTimestamps();
    }
}