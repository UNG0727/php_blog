<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    // 댓글 추가
    public function store(Comment $comment){

        $comment = new Comment();
        $comment->user_id = auth() -> id();
        $comment->post_id = request('post_id');
        $comment->body = request('body');
        $comment->parent_id = request('parent_id');
        $comment->save();

        return redirect('/blogs/'. request('post_id'));
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return response(Response::HTTP_ACCEPTED);
    }
}
