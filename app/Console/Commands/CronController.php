<?php

use Illuminate\Console\Command;
use App\Http\Controllers\HelperTrait;

class CronController extends Command
{
    use HelperTrait;

    public function trainingCheck()
    {
        $this->checkTrainings();
    }
}