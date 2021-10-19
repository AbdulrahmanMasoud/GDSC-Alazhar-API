<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User  extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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



    public function committe(){
        return $this->belongsTo(Committe::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function courses(){
        return $this->hasMeny(Courses::class);
    }
    // public function isLeader(){
    //     if(Auth::user()->role_id === 1){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    // public function isHead(){
    //     if(Auth::user()->role_id === 4){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    // public function isMember(){
    //     if(Auth::user()->role_id === 5){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
    

    
    

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
