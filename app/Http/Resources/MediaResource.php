<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->name,
            'studio' => $this->studio->name,
            'type' => $this->type,
            'ageRating' => $this->ageRating->age,
            'duration' => $this->duration,
            'release' => $this->release,
            'rating' => $this->rating,
            'episodes' => $this->episodes,
            'preview' => $this->preview,
            'contentURL' => $this->contentURL,
            'genres' => [
                // GenreResource::collection()
            ],
        ];
    }
}
