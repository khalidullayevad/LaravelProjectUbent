<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function ENT()
    {
        return $this->hasOne('App\Models\ENT');
    }
    public function Udastac()
    {
        return $this->hasOne('App\Models\Udastak');
    }
    public function school_certificate()
    {
        return $this->hasOne('App\Models\School_certeficate');
    }
    public function choice()
    {
        return $this->hasOne('App\Models\Choice');
    }
    protected $fillable = [
        'email',
        'password',
        'gender',
        'full_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public function getName(){
        if($this->full_name){
            return "{$this->full_name}";
        }
        return null;
    }
    public function getEmailOrName(){
        return $this->getName()?:$this->email;
    }
}
