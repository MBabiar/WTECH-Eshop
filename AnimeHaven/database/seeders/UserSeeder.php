<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'admin')->first();
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);
        $user->roles()->attach($role->id);
    }
}