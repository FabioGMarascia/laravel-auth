<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $post= new Post();
            $post->project_title=$faker->name;
            $post->description=$faker->text;
            $post->collaborators=$faker->name;
            $post->framework=$faker->name;
            $post->thumb=$faker->imageUrl;
            

            $post->start_project=$faker->date();
            $post->end_project=$faker->date();
            $post->save();
            }  
    }
}
