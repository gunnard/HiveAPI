<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'age' => $this->age,
			'interests' => $this->interests,
			'admission_date' => $this->admission_date,
			'admission_time' => $this->admission_time,
			'is_active' => $this->is_active
		];
    }
}
