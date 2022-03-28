<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'user_id' => 'adminshubh',
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('admin')

        ]);

        $user = User::create([
            'user_id' => 'usershubh',
            'role_id' => 2,
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password'=> bcrypt('user')

        ]);
    }
}
