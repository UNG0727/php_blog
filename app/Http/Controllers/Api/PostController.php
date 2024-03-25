<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::latest()->paginate(10);
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        //
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return response($post, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        //
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return response($post, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    // 좋아요 여부 확인
    public function isLikedByMe($id){
        $post = Post::findOrFail($id)->first();
        if (Like::whereUserId(Auth::id())->wherePostId($post->id)->exists()){
            return 'true';
        }
        return 'false';
    }

    // 좋아요 처리
    public function like(Post $post){
        // $post->likes()->where('user_id', auth()->id())->first();
        $existing_like = Like::withTrashed()->wherePostId($post->id)->whereUserId(Auth::id())->first();
        if(is_null($existing_like)){
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id()
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        } 

        return redirect('/blogs/'. $post->id);
    }
}
