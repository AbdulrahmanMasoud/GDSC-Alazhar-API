<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bio',
        'cover',
        'committe_id',
    ];

    public function committe(){
        return $this->belongsTo(Committe::class);
    }

    public function courses(){
        return $this->hasMany(Tracks::class);
    }
}
