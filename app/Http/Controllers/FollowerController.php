<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;

class FollowerController extends Controller
{
    public function follow(User $user, Request $request)
    {
        $authUser = $request->authUser;
        $followUser = $user;

        if ($authUser['id'] == $followUser->id) {
            return back()->withError("You can't follow yourself");
        }


        $isFllowing = (boolean) Follower::where('user_id', $authUser['id'])->where('follows_id', $followUser->id)->first(['id']);

        if(!$isFllowing) {
            Follower::create([
              'user_id' => $authUser['id'],
              'follows_id' => $followUser->id
            ]);
            return response()->json([]);
        }
    }

    public function unFollow(User $user, Request $request)
    {
        $authUser = $request->authUser;
        $followUser = $user;
        $follow = Follower::where('user_id', $authUser['id'])->where('follows_id', $followUser->id)->first();

        $follow->delete();
        return response()->json([]);

    }
}


