<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\RoleOnUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();

        Role::factory()->create([
            'name' => 'admin',
        ]);

        RoleOnUser::factory()->create([
            'user_id' => 1,
            'role_id' => 1
        ]);

        Role::factory()->count(3)->create();
    }
}
