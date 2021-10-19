<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bio',
        'cover',
        'track_id',
        'instractor_id',
    ];

    public function track(){
        return $this->belongsTo(Committe::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function sessions(){
        return $this->hasMany(Session::class);
    }
    
   
}
