<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Lesson as LessonResources;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        
        // Filter the datas
        return [
            "user ID" => $this->id,
            "user name" => $this->name,
            "user Email" => $this->email,
            "lessons" => LessonResources::collection($this->lessons),
        ];
    }
}
