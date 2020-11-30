<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    public function Profession()
    {
        return $this->belongsToMany('App\Models\Profession');
    }
    public function univerProf()
    {
        return $this->belongsTo('App\Models\UniverProf');
    }
}
