<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BoulderGymResource
 * @package App\Http\Resources
 */
class BoulderGymResource extends JsonResource
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
            'name' => $this->name,
            'detailUrl' => route('boulder-gyms.show', ['boulder_gym' => $this->id]),
            'boulderProblems' => BoulderProblemResource::collection($this->whenLoaded('boulderProblems')),
        ];
    }
}
