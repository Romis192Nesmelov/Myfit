<?php

use Illuminate\Database\Seeder;
use App\Training;
use App\TrainingDescription;
use App\Payment;

class TrainingsTableSeeder extends Seeder
{
    public function run()
    {
        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet mauris ac arcu faucibus, ac convallis leo luctus. Donec pulvinar pellentesque porttitor. Integer nisl nisi, fringilla vitae sodales eu, luctus eu sapien. Quisque dapibus interdum urna, quis ultricies diam venenatis accumsan. Donec at libero lacinia, sagittis risus id, auctor eros. Vestibulum elementum et risus vitae ullamcorper. Integer faucibus tincidunt nulla sed varius. Morbi id rhoncus odio. Pellentesque pretium nunc a tellus accumsan tincidunt.</p><p>Fusce in posuere turpis, ullamcorper imperdiet tellus. Sed sapien nibh, accumsan ut ligula dictum, sagittis pharetra ligula. Mauris pharetra sagittis ultricies. In vel enim arcu. Donec urna mi, condimentum a facilisis eget, laoreet at libero. Vivamus volutpat sollicitudin lacus. Maecenas mollis euismod hendrerit';
        for ($p=1;$p<=5;$p++) {
            $trainingsCount = rand(5,20);
            for ($t=0;$t<$trainingsCount;$t++) {
                $training = Training::create([
                    'photo' => '/placeholder.jpg',
                    'complexity' => rand(1,6),
                    'need_previous_completed' => rand(0,1),
                    'its_cardio' => rand(0,1),
                    'price' => rand(1000,50000),
                    'active' => 1,
                    'program_id' => $p
                ]);

                $descriptionsCount = rand(1,6);
                for ($d=0;$d<$descriptionsCount;$d++) {
                    TrainingDescription::create([
                        'description' => substr($description,0,rand(10,strlen($description)-1)),
                        'training_id' => $training->id
                    ]);
                }

                for ($u=1;$u<=5;$u++) {
                    if (rand(0,1)) {
                        Payment::create([
                            'value' => $training->price,
                            'user_id' => $u,
                            'training_id' => $training->id
                        ]);
                    }
                }
            }
        }
    }
}