<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bio',
        'cover',
    ];

    public function users(){
        return $this->hasMany(Uesr::class);
    }

    public function tracks(){
        return $this->hasMany(Tracks::class);
    }
   
}
