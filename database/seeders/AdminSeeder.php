<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    final public function run(): void
    {
        $admins = [
            'name'     => 'Admin One',
            'email'    => 'admin@one.com',
            'password' => Hash::make(User::DEFAULT_PASSWORD),
            'role' => User::ROLE_SUPER_ADMIN, // Assign super-admin role
        ];
        $user   = User::query()->where('email', $admins['email'])->exists();
        if (!$user) {
            User::query()->create($admins);
        }
    }
}
