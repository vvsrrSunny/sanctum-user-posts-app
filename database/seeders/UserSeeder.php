<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'sunnyOne',
            'email' => 'sunnyone@example.com',
            'password' => bcrypt("12345678"),
        ]);

        User::factory()->create([
            'name' => 'sunnyTwo',
            'email' => 'sunnytwo@example.com',
            'password' => bcrypt("12345678"),
        ]);
    }
}
