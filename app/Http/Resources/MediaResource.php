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
            'description' => $this->description,
            'studio' => $this->studio->name,
            'type' => $this->type,
            'ageRating' => $this->ageRating->age,
            'duration' => $this->duration,
            'release' => $this->release,
            'rating' => $this->rating,
            'episodes' => $this->episodes,
            'preview' => $this->preview,
            'contentURL' => $this->contentURL,
            'genres' => $this->mediaGenres->map(function ($mediaGenre) {
                return [
                    'id' => $mediaGenre->id,
                    'name' => $mediaGenre->genre->name,
                ];
            }),
            'directors' => $this->mediaDirectors->map(function ($mediaDirector) {
                return [
                    'id' => $mediaDirector->id,
                    'surname' => $mediaDirector->director->surname,
                    'name' => $mediaDirector->director->name,
                    'birthday' => $mediaDirector->director->birthday,
                    'bio' => $mediaDirector->director->bio,
                    'photo' => $mediaDirector->director->photo,
                ];
            }),
            'actors' => $this->mediaActors->map(function ($mediaActor) {
                return [
                    'id' => $mediaActor->id,
                    'surname' => $mediaActor->actor->surname,
                    'name' => $mediaActor->actor->name,
                    'birthday' => $mediaActor->actor->birthday,
                    'bio' => $mediaActor->actor->bio,
                    'photo' => $mediaActor->actor->photo,
                ];
            }),
            'review' => $this->reviews->map(function ($review) {
                return new ReviewResource($review);
            }),
        ];
    }
}
