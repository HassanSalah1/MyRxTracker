<?php

namespace Database\Seeders;

use App\Enums\Roles;
use App\Enums\UserStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(DoctorSeeder::class);
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // الشرط
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role' => Roles::ADMIN->value,
                'status' => UserStatus::ACTIVE->value,
            ]
        );
    }
}
