<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            $posts = new \App\Post();
            $posts->title = 'title'.$i;
            $posts->content = 'Content of title '.$i;
            $posts->save();
        }
    }
}
