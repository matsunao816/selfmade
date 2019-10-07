<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AchievementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        return view('achievement.index', [
            'user'=>$user,
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->achievement = $request->achievement;
        $user->save();
        return redirect()->route('profiles.index');
    }
}
