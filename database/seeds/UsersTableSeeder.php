<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserParam;

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
                'password' => bcrypt('pavlicova'),
                'active' => 1,
                'admin' => 1
            ],
            [
                'name' => 'Евгения Цаплева',
                'email' => 'jazzzfank@gmail.com',
                'password' => bcrypt('jazzzfank'),
                'active' => 1,
                'admin' => 1
            ],
            [
                'name' => 'Евгений Степаненко',
                'email' => 'jekadevelop@gmail.com',
                'password' => '$2y$10$a1lAnS5mcBEXzdsexLOwVukxJKMLxnvUFyS3qVKFtCGfxaf1AYBMm',
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
                'admin' => 1
            ],
            [
                'name' => 'Оксана',
                'email' => 'tonya.1109@gmail.com',
                'password' => bcrypt('tonya'),
                'active' => 1,
                'admin' => 1,
                'receive_messages' => 1
            ],
        ];

        foreach ($data as $user) {
            $user = User::create($user);
            $countParams = rand(5,20);

            for ($i=0;$i<$countParams;$i++) {
                UserParam::create([
                    'height' => 170 + rand(0,5),
                    'weight' => 90 - rand(0,20),
                    'waist_girth' => 95 + rand(0,10),
                    'hip_girth' => 70,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}