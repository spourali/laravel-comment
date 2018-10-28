<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('comments')->delete();

        $faker = Faker\Factory::create();
        for ($i=1; $i <=3 ; $i++) {

            $comment = new Comment();
            $comment->post_id = 1;
            $comment->parent_id = 0;
            $comment->owner_name = $faker->name;
            $comment->body = $faker->text;
            $comment->save();

        }
        for ($i=3; $i <10 ; $i++) {

            $comment = new Comment();
            $comment->post_id = 1;
            $comment->parent_id = rand(1,3);
            $comment->owner_name = $faker->name;
            $comment->body = $faker->text;
            $comment->save();

        }

        for ($i=3; $i <10 ; $i++) {

            $comment = new Comment();
            $comment->post_id = 1;
            $comment->parent_id = rand(3,10);
            $comment->owner_name = $faker->name;
            $comment->body = $faker->text;
            $comment->save();

        }

    }

}
