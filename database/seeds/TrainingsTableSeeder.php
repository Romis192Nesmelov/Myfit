<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Program;
use App\Training;
use App\TrainingGoal;
use App\TrainingPhoto;
use App\TrainingDay;
use App\TrainingVideo;
use App\Payment;

class TrainingsTableSeeder extends Seeder
{
    public function run()
    {
        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet mauris ac arcu faucibus, ac convallis leo luctus. Donec pulvinar pellentesque porttitor. Integer nisl nisi, fringilla vitae sodales eu, luctus eu sapien. Quisque dapibus interdum urna, quis ultricies diam venenatis accumsan. Donec at libero lacinia, sagittis risus id, auctor eros. Vestibulum elementum et risus vitae ullamcorper. Integer faucibus tincidunt nulla sed varius. Morbi id rhoncus odio. Pellentesque pretium nunc a tellus accumsan tincidunt. Fusce in posuere turpis, ullamcorper imperdiet tellus. Sed sapien nibh, accumsan ut ligula dictum, sagittis pharetra ligula. Mauris pharetra sagittis ultricies. In vel enim arcu. Donec urna mi, condimentum a facilisis eget, laoreet at libero. Vivamus volutpat sollicitudin lacus. Maecenas mollis euismod hendrerit';
        $programs = Program::where('active',1)->pluck('id')->toArray();
        $users = User::where('active',1)->pluck('id')->toArray();
        $trainingPhotoCount = 1;

        foreach ($programs as $program) {
            $trainingsCount = rand(2,5);

            for ($t=0;$t<$trainingsCount;$t++) {
                $itsCardio = $t == $trainingsCount-1;
                $withCardio = rand(0,1);
                $useWarmup = rand(0,1);
                $useHitch = rand(0,1);
                
                $training = Training::create([
                    'photo' => 'images/trainings/training'.$trainingPhotoCount.'.jpg',
                    'complexity' => rand(1,6),
                    'duration' => rand(1,10),
                    'periodicity' => rand(1,2).' раз в неделю',
                    'equipment' => 'Лук, праща, копье и палка-копалка',
                    'need_previous_completed' => rand(0,1),

                    'warning_title' => 'Варнинг ап ми №'.$t,
                    'warning_description' => 'Следи за собой, будь осторожен!',
                    'recommendation_title' => 'Рекомендация №'.$t,
                    'recommendation_description' => 'Не рекомедуется все, а в частности продукт №'.$t,

                    'warmup_warning_title' => $useWarmup ? 'Разминка варнинг заголовок №'.$t : null,
                    'warmup_warning_description' => $useWarmup ? 'Разминка варнинг-описание №'.$t : null,
                    'warmup_recommendation_title' => $useWarmup ? 'Рекомедательный заголовок разминки №'.$t : null,
                    'warmup_recommendation_description' => $useWarmup ? 'На разминке рекомендуем разогрев №'.$t : null,

                    'main_warning_title' => 'Основной контент варнинг-заголовок тренировки №'.$t,
                    'main_warning_description' => 'Основной контент тренировки варнинг-описание №'.$t,
                    'main_recommendation_title' => 'Рекомедательный заголовок основного контента тренировки №'.$t,
                    'main_recommendation_description' => ''.substr($description,rand(0,10),rand(30,strlen($description)-1)),

                    'main_cardio_title' => $withCardio ? 'Кардиологические кардио-заголовок №'.$t : null,
                    'main_cardio_description' => $withCardio ? 'Кардиологи кардиостимулировали-кардиостимулировали, да не кардиовымустимулировали. И осталось их числом: '.$t : null,

                    'hitch_warning_title' => $useHitch ? 'Заминка варнинг заголовок №'.$t : null,
                    'hitch_warning_description' => $useHitch ? 'Заминка варнинг-описание №'.$t : null,
                    'hitch_recommendation_title' => $useHitch ? 'Рекомедательный заголовок заминки №'.$t : null,
                    'hitch_recommendation_description' => $useHitch ? 'На заминке рекомендуем полежать в позе №'.$t : null,
                    
                    'with_cardio' => $itsCardio ? 1 : $withCardio,
                    'its_cardio' => $itsCardio,
                    'price' => rand(1000,50000),
                    'active' => 1,
                    'program_id' => $program
                ]);

                if ($trainingPhotoCount == 25) $trainingPhotoCount = 1;
                else $trainingPhotoCount++;

                for ($f=0;$f<6;$f++) {
                    TrainingPhoto::create([
                        'photo' => 'images/photos/photo'.($f+1).'.jpg',
                        'training_id' => $training->id
                    ]);
                }

                if (!$itsCardio) {
                    $daysCount = rand(1,3);
                    $emphasis = ['качаем бицепсы','качаем трицепсы','качаем широчайшие мышцы спины'];
                    for ($d=0;$d<$daysCount;$d++) {
                        $trainingDay = TrainingDay::create([
                            'emphasis' => $emphasis[$d],
                            'training_id' => $training->id
                        ]);

                        for ($v=0;$v<12;$v++) {
                            TrainingVideo::create([
                                'video' => 'https://youtu.be/bUrvOqjTfks',
                                'training_day_id' => $trainingDay->id
                            ]);
                        }
                    }
                }

                $goalsCount = rand(1,10);
                for ($g=0;$g<$goalsCount;$g++) {
                    TrainingGoal::create([
                        'goal' => substr($description,0,rand(5,20)),
                        'training_id' => $training->id
                    ]);
                }

                $notPaid = 0;
                foreach ($users as $user) {
                    if (rand(0,1) || $notPaid >= $trainingsCount/2) {
                        Payment::create([
                            'value' => $training->price,
                            'user_id' => $user,
                            'training_id' => $training->id
                        ]);
                    } else $notPaid++;
                }
            }
        }
    }
}