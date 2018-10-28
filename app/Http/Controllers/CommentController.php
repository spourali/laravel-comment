<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class CommentController
{


    public function index(){

        $comments = Comment::where('post_id', 1)
            ->where('parent_id', 0)
            ->get();

        return \View::make('comments', compact(['comments']));
    }



    public function store(){

        $input = Input::all();

        $comment = new Comment();
        $comment->post_id = 1;
        $comment->parent_id = $input['parent_id'];

        $comment->owner_name = $input['owner_name'];
        $comment->body = trim(stripslashes($input['body']));
        $comment->save();

        $comments = Comment::where('post_id', 1)
            ->where('parent_id', 0)
            ->get();

        $html = \View::make('content', compact(['comments']))->render();


        return new JsonResponse([$html], 200);


    }
}