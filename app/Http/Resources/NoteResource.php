<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'id' => $this->id,
            'owner' => $this->user->name,
            'title' => $this->title,
            'content' => $this->content,
            'shared' => $this->shared == '1' ? true : false,
            'shared_date' => $this->updated_at,
        ];
    }
}
