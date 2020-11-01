<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'creator' => $this->creator,
            'created_at' => $this->created_at ? $this->created_at->toDateTimeString() : null
        ];
    }
}
