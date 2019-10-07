<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use App\Post;
use App\Like;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Follower;


use App\Http\Controllers\Controller;



class PostController extends Controller
{
    public function index()
    {
        $q = \Request::query();
        $id = Auth::id();
        $userAuth = \Auth::user();
        if(Auth::check()){
        $followedId = Follower::where('user_id', $userAuth->id)->pluck('follows_id');
        $follows = User::whereIn('id', $followedId)->get();
        }else{
            $follows= 1;
        }
        
        if(isset($q['tag_name'])){
            $posts = Post::latest()->where('tag', 'like', "%{$q['tag_name']}%")->paginate(12);
            $posts->load('user', 'tags');

            return view('posts.tag', [
                'posts' => $posts,
                'tag_name' => $q['tag_name']
            ]);
        }else {
            //新着順
            $newposts = Post::latest()->paginate(12);
            $newposts->load('user', 'tags');
            //ランキング順　likeが多い順にソート
            $likes = Like::all();

            $rankposts = Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(20);

            return view('top', [
                'rankposts' => $rankposts,
                'newposts' => $newposts, 
                'userAuth' => $userAuth,
                'follows' => $follows
            ]);
        }
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(PostRequest $request)
    {
        if($request->file('image')->isValid()) {
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->tag = $request->tag;
            //imageの抽出
            $image = $request->file('image');         
            $filename = $image->store('public/image');
            $post->image = basename($filename);
            // tagからタグを抽出
            preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->tag, $match);
            $tags = [];
            foreach ($match[1] as $tag) {
                $found = Tag::firstOrCreate(['tag_name' => $tag]);
                array_push($tags, $found);
            }
            $tag_ids = [];
            foreach ($tags as $tag) {
                array_push($tag_ids, $tag['id']);
            }
            $post->save();
            $post->tags()->attach($tag_ids);
        }
        return redirect('/');
    }
    public function show(Post $post)
    {
        if(Auth::check()){
            $users = User::all();
            $users->load('followers');

            $userAuth = \Auth::user();
            $post->load('likes'); 
            $defaultCount = count($post->likes);
            $defaultLiked = $post->likes->where('user_id', $userAuth->id)->first();
            if (is_array($defaultLiked)) {
                count($defaultLiked);
                if(count($defaultLiked) == 0) {
                    $defaultLiked == false;
                } else {
                    $defaultLiked == true;
                }
            }
            return view('posts.show', [
                'post' => $post,
                'userAuth' => $userAuth,
                'defaultLiked' => $defaultLiked,
                'defaultCount' => $defaultCount,
                'users' => $users,
            ]);
        }
        else{
            return view('posts.show', [
                'post'=>$post
            ]);
        }
    }
    public function edit(Post $post)
    {
        $post->load('user'); //Postモデルを参照

        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('profiles.show')
                        ->with('success', 'Biodata siswa deleted successfully');
    }

    public function search(Request $request)
    {
        $posts = Post::latest()
            ->where('title', 'like', "%{$request->search}%")   //likeにより曖昧検索が可能
            ->orWhere('tag', 'like', "%{$request->search}%")    //追加の検索
            ->paginate(12);

        $search_result = $request->search.'の検索結果'.$posts->total().'件';

        return view('posts.search', [
            'posts' => $posts,
            'search_result' => $search_result,
            'search_query'  => $request->search,
        ]);
    }
    public function newpost(Request $request)
    {
        $posts = Post::latest()->paginate(12);
        return view('posts.newpost', [
            'posts' => $posts,
        ]);
    }
}
