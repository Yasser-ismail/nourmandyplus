<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $id = [1,2,3,4,5,6,7,8,9];

        for ($i=0; $i<10; $i++){
            $array =[
                'name'=>$faker->word,
                'user_id'=>1,
                'meta_keywords'=>$faker->name,
                'meta_des'=>$faker->name,
                'category_id'=>1,
                'youtube'=>'https://www.youtube.com/watch?v=TIhton7vyFc',
                'published'=>rand(0,1),
                'image'=>'/images/1580408456laravel.jpg',
                'des'=>$faker->paragraph,

            ];

            $video =\App\Models\Video::create($array);
            $video->skills()->sync(array_rand($id, 2));
            $video->tags()->sync(array_rand($id, 1));
        }
    }
}
