<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BiographyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $mediaAsActor = collect($this->mediaActors)->map(function ($mediaActor) {
            return [
                'id' => $mediaActor->media->id,
                'name' => $mediaActor->media->name,
                'preview' => $mediaActor->media->preview,
            ];
        });

        $mediaAsDirector = collect($this->mediaDirectors)->map(function ($mediaDirector) {
            return [
                'id' => $mediaDirector->media->id,
                'name' => $mediaDirector->media->name,
                'preview' => $mediaDirector->media->preview,
            ];
        });

        $allMedia = $mediaAsActor->merge($mediaAsDirector)->unique('id')->values();

        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'bio' => $this->bio,
            'birthday' => $this->birthday,
            'photo' => $this->photo,
            'media' => $allMedia,
        ];
    }
}

