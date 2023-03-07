<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobAdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "user"=>$this->user->name,
            "description" => $this->description,
            "category" => $this->category->name,
            "ral" => $this->ral,
            "skills" => $this->skills,
            "maked" => $this->maked,  //proprietà fuori dalla tabella-> non inclusa nel DB
        ];
    }
}
