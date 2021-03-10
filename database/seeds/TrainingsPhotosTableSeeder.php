<?php

use Illuminate\Database\Seeder;
use App\TrainingPhoto;

class TrainingsPhotosTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1;$i<=10;$i++) {
            TrainingPhoto::create([
                'photo' => 'images/photos/photo'.$i.'.jpg',
                'type' => $i <= 6 ? 1 : 2
            ]);
        }
    }
}