<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'ISBN'=>$this->ISBN,
            'title'=>$this->title,
            'author'=>$this->author,
            'description'=>$this->description,
            'price'=>$this->price,
            'year'=>$this->year
        ];
    }
}
