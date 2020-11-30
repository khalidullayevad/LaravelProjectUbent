<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniverProf extends Model
{
    use HasFactory;
    public function profession()
    {
        return $this->hasMany('App\Models\Profession');
    }
    public function univer()
    {
        return $this->hasMany('App\Models\University');
    }
    public function winners()
    {
        return $this->hasMany('App\Models\Winners');
    }
    public function choice()
    {
        return $this->hasMany('App\Models\Choice');
    }
}
