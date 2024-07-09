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
        $url = 'https://imgs.search.brave.com/vFitliQZ4kHN7CUtgzgHSzWLptT2_6dhHwMxvHF9Kqs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTM0/NTk0MjU2Mi9pdC9m/b3RvL2dhdHRpbm8t/Z2F0dG8tYnJpdGFu/bmljby1jaGUtZ3Vh/cmRhLWxhLW1hY2No/aW5hLWZvdG9ncmFm/aWNhLmpwZz9zPTYx/Mng2MTImdz0wJms9/MjAmYz1lYVhaTks2/cHdYS1lTVGkyT0dr/T0FFTUZnRm8zcDZL/b0ZWeVpTMXlicDE0/PQ';
        for ($i = 0; $i < 12; $i++) {
            $post = new Post();
            $post->project_title = $faker->name;
            $post->description = $faker->text;
            $post->collaborators = $faker->name;
            $post->framework = $faker->name;
            $post->thumb = $url;


            $post->start_project = $faker->date();
            $post->end_project = $faker->date();
            $post->save();
        }
    }
}
