<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $role_admin = Role::where('code', 'admin')->first();
        $role_user = Role::where('code', 'user')->first();

        User::create([
            'surname' => 'Adminov',
            'name' => 'Admin',
            'email' => 'admin@mail.ru',
            'password' => 'admin123',
            'birthday' => '2000-01-01',
            'api_token' => '1',
            'remember_token' => '1',
            'role_id' => $role_admin->id,
        ]);

        User::create([
            'surname' => 'Userov',
            'name' => 'User',
            'email' => 'user@mail.ru',
            'password' => 'user123',
            'birthday' => '2000-01-01',
            'api_token' => '2',
            'remember_token' => '2',
            'role_id' => $role_user->id,
        ]);
    }
}
