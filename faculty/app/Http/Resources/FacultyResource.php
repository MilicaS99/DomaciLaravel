<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacultyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='post';
    public function toArray($request)
    {
        return[
        'id'=>$this->resource->id,
        'ImeFakulteta' => $this->resource->ImeFakulteta,
            'body' => $this->resource->body,
            'city' => $this->resource->city,
            'user' => new UserResource($this->resource->user)

        ];
    }
}
