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
        $posts_list = Post::where('flg_main_banner', False)->orderBy('created_at', 'desc')->get();
        $post_big = Post::where('flg_main_banner', True)->first();
        return view('pages.portal.index', [
            'posts' => $posts_list,
            'posts_list' => $posts_list,
            'post_big' => $post_big
        ]);
    }

    public function post_page($post_id) {
        $posts_list = Post::where('flg_main_banner', False)->orderBy('created_at', 'desc')->get();
        $post = Post::where('id', $post_id)->first();
        return view('pages.portal.post-page', [
            'post' => $post,
            'posts_list' => $posts_list
        ]);
    }

    public function post_type_page($post_type_id) {
        $posts = Post::where('post_type_id', $post_type_id)->get();
        return view('pages.portal.post-type-page', [
            'posts' => $posts
        ]);
    }
}
