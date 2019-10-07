<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');
Route::get('/posts/search', 'PostController@search')->name('posts.search');
Route::get('/posts/newpost', 'PostController@newpost')->name('posts.newpost');
Route::get('/users/{user}/follow', 'UserController@showFollow')->name('show.follow');
Route::get('/users/{user}/follower', 'UserController@showFollower')->name('show.follower');
Route::get('ranking', function(){
  $userAuth = \Auth::user();
  $rankposts = App\Post::withCount('likes')->orderBy('likes_count', 'desc')->paginate(20);
  $rankposts->withPath('ranking');
  return view('posts.ranking', [
    'rankposts' => $rankposts,
    'userAuth' => $userAuth
  ]);
});

Route::resource('/posts','PostController',['except'=>['index']]);
Route::resource('/profiles','ProfileController');
Route::resource('/achievement','AchievementController');
Route::resource('/icon','IconController');
Route::resource('/users','UserController');
Route::resource('/comments', 'CommentController')->middleware('auth');

