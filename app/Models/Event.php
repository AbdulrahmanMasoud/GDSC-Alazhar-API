<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'latitude',
        'longitude',
    ];




    /**
     * Set the Status.
     *
     * @param  string  $value
     * @return void
     */
    public function getStatusAttribute($value) // I dont Use It yet
    {
       return $this->attributes['event_date'] >= date("Y-m-d") ?  true :  false;
    }
}
