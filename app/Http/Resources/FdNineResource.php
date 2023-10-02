<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FdNineResource extends JsonResource
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

        if(empty($this->status)){

            return [



                'id' => $this->id,
                'fd9_foreigner_name'=>$this->fd9_foreigner_name,
                'fd9_passport_number'=>$this->fd9_passport_number ,
                'fd9_nationality_or_citizenship'=>$this->fd9_nationality_or_citizenship,
                'status' =>'Ongoing',
                'created_at' => $this->created_at->format('d-M-Y'),







            ];

        }else{


            return [



                'id' => $this->id,
                'fd9_foreigner_name'=>$this->fd9_foreigner_name,
                'fd9_passport_number'=>$this->fd9_passport_number ,
                'fd9_nationality_or_citizenship'=>$this->fd9_nationality_or_citizenship,
                'status' => $this->status,
                'created_at' => $this->created_at->format('d-M-Y'),







            ];


        }


    }
}
