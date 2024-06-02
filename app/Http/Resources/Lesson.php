<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResources;

class Lesson extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "Lesson ID" => $this->id,
            "Auther" => $this->user->name,
            "lesson title" => $this->title,
            "lesson para" => $this->body,
            "tags" => TagResources::collection($this->tags),
        ];
    }
}
