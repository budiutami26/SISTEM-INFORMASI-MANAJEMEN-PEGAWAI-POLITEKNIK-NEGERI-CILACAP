<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'BUDI UTAMI',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('user1234'),
                'role_id' => 1,
                ]
            ];

        User::insert($users);

    }
}
