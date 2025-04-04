<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Профиль пользователя
    public function profile() {
        $user = auth()->user();

        return response()->json([
            'user' => new UserResource($user),
        ])->setStatusCode(200);
    }

    // Редактирование профиля пользователя
    public function update(UserUpdateRequest $request) {
        $user = auth()->user();

        $data = $request->validated();

        // Обработка avatar-файла
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user->update($data);

        return response()->json([
            'user' => new UserResource($user),
        ])->setStatusCode(200);
    }
}
