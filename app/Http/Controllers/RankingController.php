<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use App\Post;
use App\Like;


class RankingController extends Controller
{
    public function index()
    {
        $q = \Request::query();
        $user = \Auth::user();
        $id = Auth::id();
        $userAuth = \Auth::user();
        $rankposts = Post::withCount('likes')->orderBy('likes_count', 'desc');

        return view('posts.ranking', [
            'rankposts' => $rankposts,
            'userAuth' => $userAuth
        ]);
    }
}
