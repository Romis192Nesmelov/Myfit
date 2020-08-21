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
            ],
            [
                'name' => 'Юлия Павликова',
                'email' => 'pavlicova67@gmail.com',
                'password' => '',
                'active' => 1,
                'admin' => 0
            ],
            [
                'name' => 'Евгений Степаненко',
                'email' => 'jekadevelop@gmail.com',
                'password' => '',
                'active' => 1,
                'admin' => 0
            ],
            [
                'name' => 'Евгений',
                'location' => 'Украина',
                'email' => 'Jekadevelep@gtmail.com',
                'password' => '$2y$10$a1lAnS5mcBEXzdsexLOwVukxJKMLxnvUFyS3qVKFtCGfxaf1AYBMm',
                'active' => 1,
                'admin' => 0
            ],
            [
                'name' => 'Юлия',
                'location' => 'Узбекистан',
                'email' => 'fekipa2328@aenmail.net',
                'password' => '$2y$10$tKv0DECLg3.hI7Usdn8yZOjgq.dEFgYkcJQ1rBv8n/g7bLl9mNaSu',
                'active' => 1,
                'admin' => 0
            ],
        ];

        foreach ($data as $user) {
            User::create($user);
        }
    }
}