<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([

            'name' => 'Инесса',
            'last_name' => 'Черменская',
            'email' => 'inessa_cherm@tut.by',
            'phone_number' => '375447265285',
            'role' => 'admin',
            'picture' => 'users/1/admin_picture.png',
            'password' => bcrypt('1')
        ]);
    }
}
