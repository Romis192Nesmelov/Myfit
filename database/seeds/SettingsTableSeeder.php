<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        Settings::create([
            'name' => 'video_advices_price',
            'value' => 1000
        ]);

        Settings::create([
            'name' => 'feeds_price',
            'value' => 2000
        ]);
    }
}