@extends('layouts.index')

@section('content')

<div class="subcontents-frame">
  <div class="subcaption title-border">
  {{ $post->title }}
  </div>
</div>
<?php
use Carbon\Carbon;
/* モデル取得後 */
$date = Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y年m月d日 H:i');
?>

<div class="container" style="text-align: center;">
  <div class="card" >
    <div class="card-img-top" style="background-color:#F3F3F3;">
      <img class="img-pro" src="{{ asset('storage/image/'.$post->image) }}">
    </div>
    <div class="container text-left textarea">
      
      <h3 class="card-title" style=" margin-top:30px;">{{ $post->title }}
      
      </h3>
      <p class="card-text">{{ $post->content }}</p>
      <h6 style="margin:0 0 20px 0;">
        @foreach($post->tags as $tag)
          <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">
              #{{ $tag->tag_name }}
          </a>
        @endforeach<br>
        <div style="color:#808080; font-size:15px; margin-top:10px;">{{$date}}</div>
      </h6>
      <h6 class="card-text" style="margin-bottom:15px;">
        <a href="{{ route('users.show', $post->user_id) }}" class="text-secondary">
          @if(isset($post->user->icon))
          <img src="{{ asset('storage/image/'.$post->user->icon) }}" style="border-radius: 50%; width:40px; height:40px;" alt="">
          @else
          <img src="/img/icon.jpg" style="border-radius: 50%; width:30px; height:30px;" alt="">
          @endif
          <span style="margin-right:10px;">{{ $post->user->name }}</span>
        </a>
        @if(Auth::check())
          <?php
          if($post->user->followers->isEmpty()) {
            $defaultFollowed = false;
          } else {
            foreach ($post->user->followers as $key => $follower) {
              if($userAuth->id == $follower->id) {
                $defaultFollowed = true;
                  break;
              } else {
                $defaultFollowed = false;
              }
            }
          }
          ?>
          @if($post->user->id!=Auth::user()->id)
            <follow
            :follow-user="{{json_encode($post->user)}}"
            :auth-user="{{json_encode($userAuth)}}"
            :default-followed="{{json_encode($defaultFollowed)}}"
            ></follow>
          @endif
        @endif 
      </h6>
      </div>
      @if (Auth::check())
        @if($post->user->id!=Auth::user()->id)
          <like
          :post-id="{{ json_encode($post->id) }}"
          :user-id="{{ json_encode($userAuth->id) }}"
          :default-Liked="{{ json_encode($defaultLiked) }}"
          :default-Count="{{ json_encode($defaultCount) }}"
          ></like>
        @else
          <h4>
          <i class="fas fa-heart text-danger"></i> {{ count($post['likes']) }}
          </h4>
        @endif
      @else
        <h4>
        <a class="text-secondary" style="text-decoration: none;" href="/login"><i class="fas fa-heart text-danger"></i> {{ count($post['likes']) }}</a>
        </h4>
      @endif
    <div class="card" >
    <h4 style="margin-top:10px;">コメント</h4>
    <div class="sample">
      <div class="text">
      @foreach($post->comments as $comment)
      <div style="margin:10px;">
        @if(isset($comment->user->icon))
          <img src="{{ asset('storage/image/'.$comment->user->icon) }}" style="border-radius: 50%; width:30px; height:30px;" alt=""> 
        @else
          <img src="/img/icon.jpg" style="border-radius: 50%; width:30px; height:30px;" alt="">
        @endif
        <a style="margin:0 10px;" class="text-secondary" href="{{ route('users.show', $post->user_id) }}" >{{ $comment->user->name }}</a>
        {{ $comment->comment }}
        <span style="color:#C0C0C0; font-size:12px;">
        <?php 
        //投稿時間表示
        $time = $comment->created_at;
        $gion = new Data\Foo();
        $time = $gion->convert_to_fuzzy_time($time);
        echo $time;
        ?>
        </span>
        <br/>
      </div>
      @endforeach
      </div>
    </div>
    <div class="container" style="padding:10px;">
      <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-primary">コメントする</a>
    </div>
    </div>
  </div>
</div>
@endsection