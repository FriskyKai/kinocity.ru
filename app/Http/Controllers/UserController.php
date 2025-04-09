<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(UserResource::collection($users))->setStatusCode(200);
    }

    public function show($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();

        if (empty($user)) {
            throw new ApiException('Not Found', 404);
        }

        return response()->json([
            'user' => new UserResource($user),
        ])->setStatusCode(200);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        if (empty($user)) {
            throw new ApiException('Not Found', 404);
        }

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

    public function destroy(User $user)
    {
        if (empty($user)) {
            throw new ApiException('Not Found', 404);
        }

        DB::beginTransaction();

        try {
            // Удаляем связанные записи
            $user->favorites()->delete();
            $user->reviews()->delete();

            // Удаляем avatar-файл, если есть
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Удаляем пользователя
            $user->delete();

            DB::commit();

            return response()->json('Пользователь удалён успешно.')->setStatusCode(200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json('Ошибка удаления пользователя: ' . $e->getMessage(), 500);
        }
    }
}
