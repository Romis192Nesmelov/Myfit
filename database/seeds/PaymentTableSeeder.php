<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Training;
use App\Payment;
use App\Message;

class PaymentTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id')->toArray();
        $trainings = Training::all();

        foreach ($trainings as $training) {
            foreach ($users as $user) {
                $message = Message::create(['new' => 1]);
                Payment::create([
                    'value' => $training->price,
                    'user_id' => $user,
                    'training_id' => $training->id,
                    'active' => rand(0,1),
                    'message_id' => $message->id
                ]);
            }
        }
    }
}