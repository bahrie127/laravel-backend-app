<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'descripton' => $this->description,
            'price' => $this->price,
            'image_product' => $this->image_url,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
