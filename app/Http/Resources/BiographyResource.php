<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BiographyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // Определим, связана ли биография с медиа как актёр
        $mediaAsActor = $this->mediaActors?->map(function ($mediaActor) {
            return [
                'id' => $mediaActor->media->id,
                'name' => $mediaActor->media->name,
                'preview' => $mediaActor->media->preview,
            ];
        }) ?? [];

        // Или как режиссёр
        $mediaAsDirector = $this->mediaDirectors?->map(function ($mediaDirector) {
            return [
                'id' => $mediaDirector->media->id,
                'name' => $mediaDirector->media->name,
                'preview' => $mediaDirector->media->preview,
            ];
        }) ?? [];

        // Объединяем всё в один массив
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
