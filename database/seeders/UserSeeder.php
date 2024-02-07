<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Super Admin',
            'phone_number' => '+917874319733',
            'user_id' => '19733-1',
            'password' => bcrypt('123456'),
            'role' => 1,
            'is_lock' => 0
        ]);
    }
}
