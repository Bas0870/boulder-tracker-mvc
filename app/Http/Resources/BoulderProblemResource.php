<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BoulderProblemResource extends JsonResource
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
            'id' => $this->id,
            'grade' => $this->grade,
            'isTopped' => (bool) count($this->usersThatToppedProblem),
            'image' => $this->image ? Storage::url($this->image) : null,
            'creator' => $this->creator,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null
        ];
    }
}
