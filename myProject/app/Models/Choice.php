<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    public function unverProf()
    {
        return $this->belongsTo('App\Models\UniverProf');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
