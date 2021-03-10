<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(TrainingsTableSeeder::class);
        $this->call(TrainingsPhotosTableSeeder::class);
        $this->call(FeedsTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
    }
}
