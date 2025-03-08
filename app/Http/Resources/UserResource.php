<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role' => $this->role->name,
            'surname' => $this->surname,
            'name' => $this->name,
            'email' => $this->email,
            'birthday' => $this->birthday,
            'avatar' => $this->avatar,
        ];
    }
}
