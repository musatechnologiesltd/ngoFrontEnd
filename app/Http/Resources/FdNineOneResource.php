<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FdNineOneResource extends JsonResource
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
                'prokolpo_name'=>$this->prokolpo_name ,
                'sarok_number'=>$this->sarok_number,
                'status' => 'Ongoing',
                'created_at' =>date('d-m-Y', strtotime($this->application_date)),







            ];

        }else{


            return [



                'id' => $this->id,
                'prokolpo_name'=>$this->prokolpo_name ,
                'sarok_number'=>$this->sarok_number,
                'status' => $this->status,
                'created_at' =>date('d-m-Y', strtotime($this->application_date)),

            ];


        }
    }
}
