<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $tags = factory(GJames\Tag::class, 10)->create();

        $categories = factory(GJames\Category::class, 5)->create()->each(function ($c) use ($tags) {
            $post_count = rand(0, 10);
            for($i = 0; $i < $post_count; $i++) {
                $c->posts()->save(factory(GJames\Post::class)->make())->tags()->attach($tags->random(rand(1,5)));
            }
            
        });
    }
}
