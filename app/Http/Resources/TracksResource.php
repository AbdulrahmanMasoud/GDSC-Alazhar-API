<?php

namespace App\Http\Resources;

use App\Models\Committe;
use App\Models\Tracks;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class TracksResource extends JsonResource
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
            'name' => $this->name,
            'bio' => $this->bio,
            'cover' => $this->cover,
            'committe' => $this->committe->name,
            'courses_count' => DB::table('courses')->where('track_id', $this->id)->count(),
            
          ];
    }
}
