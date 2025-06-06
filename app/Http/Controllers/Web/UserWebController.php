<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserWebController extends Controller
{
    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    public function store(RegisterRequest $request) {
        $role_user = Role::where('code', 'user')->first();

        $data = $request->validated();

        // Обработка avatar-файла
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user = User::create([
            ...$data,
            'role_id' => $role_user->id,
        ]);

        return redirect()->route('users.index');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('surname', 'like', '%' . $search . '%');
        })->get();

        return view('users.index', compact('users'));
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user) {
        $data = $request->validated();

        // Обработка avatar-файла
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy(User $user) {
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

            return redirect()->route('users.index');
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json('Ошибка удаления пользователя: ' . $e->getMessage(), 500);
        }
    }
}
