<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winners extends Model
{
    use HasFactory;
    public function unverProf()
    {
        return $this->belongsTo('App\Models\UniverProf');
    }
}
