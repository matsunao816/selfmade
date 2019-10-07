<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $posts = Post::latest()->paginate(12);
        return view('profiles.index', [
            'user'=>$user,
            'posts'=>$posts,
        ]);
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('profiles.edit', [
            'post'=>$post,
        ]);
    }
    public function update(PostRequest $request, $id)
    {
            $post = Post::find($id);
            $post->tag= $request->tag;
            $post->content = $request->content;
            $post->title = $request->title;
            $filename = $request->file('image')->store('public/image');
            $post->image = basename($filename);
            $post->save();
            return redirect()->route('profiles.index');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('profiles.index');
    }

}
