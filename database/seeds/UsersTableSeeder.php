<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Romis',
                'email' => 'romis.nesmelov@gmail.com',
                'password' => bcrypt('apg192'),
                'active' => 1,
                'admin' => 1
            ]
        ];

        foreach ($data as $user) {
            User::create($user);
        }
    }
}