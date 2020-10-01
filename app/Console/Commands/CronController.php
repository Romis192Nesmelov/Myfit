<?php

use Illuminate\Console\Command;
use App\Http\Controllers\HelperTrait;

class CronController extends Command
{
    use HelperTrait;

    public function test()
    {
        file_put_contents(base_path('public/images/test.txt'),'test test test');
    }
}