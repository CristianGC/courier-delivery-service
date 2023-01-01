<?php

namespace Database\Seeders;

use App\Models\Post;
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
        // \App\Models\User::factory(10)->create();

        Post::factory(64)->create();

        /*
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'description' => Str::random(30)
        ]);
        */
    }
}
