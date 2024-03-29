<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PlanCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'currency' => $this->currency,
            'duration' => $this->duration,
            'href' => [
                'link' => route('plans.show', $this->id),
            ]
        ];
    }
}
