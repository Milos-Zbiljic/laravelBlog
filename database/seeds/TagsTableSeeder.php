<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
        	'Blogging',
        	'Freelancing',
        	'How to Succeed',
        	'Internet Marketing',
        	'Miscellaneous',
        ];

        //App\Tag::truncate();

        foreach ($values as $value) {
        	App\Tag::create([
        		'name' => $value,
        	]);
        }

        App\Post::all()->each(function (App\Post $post) use ($values) {
        	$randomIds = App\Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
        	$post->tags()->attach($randomIds);
        });
    }
}
