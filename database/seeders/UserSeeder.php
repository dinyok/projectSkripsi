<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('password'),
            'pin' => '123456'
        ]);

        $admin->assignRole('admin');
    }
}
