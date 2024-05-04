<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
