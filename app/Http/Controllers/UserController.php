<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follower;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('posts');
        $users = User::all();
        $users->load('followers');
        $userAuth = Auth::user();

        return view('users.show', [
            'user' => $user,
            'users'=>$users,
            'userAuth'=>$userAuth
        ]);
    }
    public function showFollow(User $user)
    {
        $followedId = Follower::where('user_id', $user->id)->pluck('follows_id');
        $follows = User::whereIn('id', $followedId)->get();


        return view('users.follow', [
            'follows' => $follows
        ]);
    }
    public function showFollower(User $user)
    {
        $followerId = Follower::where('follows_id', $user->id)->pluck('user_id');
        $followers = User::whereIn('id', $followerId)->get();

        return view('users.follower', [
            'followers' => $followers
        ]);
    }
}
