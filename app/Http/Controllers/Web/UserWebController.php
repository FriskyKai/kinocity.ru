<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function index()
    {
        $users = User::all();

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
        // destroy
    }
}
