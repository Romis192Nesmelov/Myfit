<?php

use Illuminate\Database\Seeder;
use App\Feed;
use App\User;

class FeedsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id')->toArray();
        function getString()
        {
            $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet mauris ac arcu faucibus, ac convallis leo luctus. Donec pulvinar pellentesque porttitor. Integer nisl nisi, fringilla vitae sodales eu, luctus eu sapien. Quisque dapibus interdum urna, quis ultricies diam venenatis accumsan. Donec at libero lacinia, sagittis risus id, auctor eros. Vestibulum elementum et risus vitae ullamcorper. Integer faucibus tincidunt nulla sed varius. Morbi id rhoncus odio. Pellentesque pretium nunc a tellus accumsan tincidunt.</p><p>Fusce in posuere turpis, ullamcorper imperdiet tellus. Sed sapien nibh, accumsan ut ligula dictum, sagittis pharetra ligula. Mauris pharetra sagittis ultricies. In vel enim arcu. Donec urna mi, condimentum a facilisis eget, laoreet at libero. Vivamus volutpat sollicitudin lacus. Maecenas mollis euismod hendrerit.';
            $startPos = rand(0,ceil(strlen($text)/2));
            $endPos = rand(1,strlen($text)-$startPos);
            return substr($text,$startPos,$endPos);
        }

        for ($i=0;$i<50;$i++) {
            Feed::create([
                'user_id' => $users[rand(0,count($users)-1)],
                'recipe' => getString(),
                'comment' => getString(),
                'paid' => rand(0,1),
                'new' => 1
            ]);
        }
    }
}