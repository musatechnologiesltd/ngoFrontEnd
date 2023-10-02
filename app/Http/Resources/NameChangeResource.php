<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NameChangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [



            'id' => $this->id,
            'previous_name_ban'=>$this->previous_name_ban,
            'previous_name_eng'=>$this->previous_name_eng ,
            'present_name_ban'=>$this->present_name_ban,
            'present_name_eng' => $this->present_name_eng,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d-M-Y'),

        ];
    }
}
