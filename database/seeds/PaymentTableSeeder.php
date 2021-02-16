<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Training;
use App\Payment;

class PaymentTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id')->toArray();
        $trainings = Training::all();

        foreach ($trainings as $training) {
            if (rand(0,1)) {
                Payment::create([
                    'value' => rand(0,1) ? $training->price : ceil($training->price/rand(2,4)),
                    'user_id' => $users[rand(0,count($users)-1)],
                    'training_id' => $training->id,
                    'active' => rand(0,1)
                ]);
            }
        }
    }
}