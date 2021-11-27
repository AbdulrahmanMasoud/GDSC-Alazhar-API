<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title' => $this->title,
            'cover' => $this->title !== null ? $this->title : 'no cover',
            'description' => $this->description ,
            'event_date' => $this->event_date ,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status' => $this->status == 1 ? $this->event_date : 'Run out',
            // 'status' => $this->Status, // If i Run Gettr I will use this
        ];
    }
}
