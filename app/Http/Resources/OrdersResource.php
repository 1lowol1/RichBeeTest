<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
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
          'id'          => $this->id,
          'orderName'   => $this->orderName,
          'description' => $this->description,
          'cost'        => $this->cost,
          'created_at'  => $this->created_at,
          'updated_at'  => $this->updated_at,
        ];
    }
}
