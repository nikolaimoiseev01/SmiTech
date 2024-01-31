<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function main_page() {
        $posts_list = Post::all();
        $post_big = Post::orderBy('created_at', 'desc')->first();
        return view('pages.portal.index', [
            'posts' => $posts_list,
            'posts_list' => $posts_list,
            'post_big' => $post_big
        ]);
    }

    public function post_page($post_id) {
        $post = Post::where('id', $post_id)->first();
        return view('pages.portal.post-page', [
            'post' => $post
        ]);
    }

    public function topic_page($topic_id) {
        $posts = Post::where('topic_id', $topic_id)->get();
        return view('pages.portal.topic-page', [
            'posts' => $posts
        ]);
    }
}
