<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IconRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class IconController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('icon.index', [
            'user'=>$user,
        ]);
    }
    public function update(IconRequest $request, $id)
    {
        if($request->file('icon')->isValid()) {
            $user = User::find($id);
            $filename = $request->file('icon')->store('public/image');
            $user->icon = basename($filename);
            $user->save();
        }
        return redirect()->route('profiles.index');
    }
}
