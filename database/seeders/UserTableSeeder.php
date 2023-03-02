<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1, // default role for new users
            'name' => 'Nadim Bhuiyan',
            'email' => 'nadim2513@student.nstu.edu.bd',
            'status' => 'active',
            'password' => bcrypt(12345678)
        ]);
    }
}
