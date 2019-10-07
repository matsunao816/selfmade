@extends('layouts.index')

@section('content')
<?php 
$likesum=0; 
$postsum=0;
foreach($user->posts as $post){
  $likesum+=count($post->likes);
  $postsum++;
}
?>


<div class="subcontents-frame">
  <div class="subcaption title-border">
    {{ $user->name }}の投稿
  </div>
</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="card">
  <div class="container">
    <div class="row">
      <div class="col-3 text-right" style="margin:5px 0;" >
        <a href="{{ route('icon.index') }}" >
          @if(isset($user->icon))
          <img class="d-none d-sm-inline" src="{{ asset('storage/image/'.$user->icon) }}" style="border-radius: 50%; width:130px; height:130px;">
          <img class="d-inline d-sm-none" src="{{ asset('storage/image/'.$user->icon) }}" style="border-radius: 50%; width:90px; height:90px;">
          @else
          <img class="d-none d-sm-inline" src="/img/icon.jpg" style="border-radius: 50%; width:130px; height:130px;" alt="">
          <img class="d-inline d-sm-none" src="/img/icon.jpg" style="border-radius: 50%; width:90px; height:90px;" alt="">
          @endif
        </a>
      </div>
      <div class="d-none d-sm-inline col-5 text-left" style="margin-top:20px;">
        <h5>
          {{ $user->name }}
          @if(isset($user->achievement))
            @if($user->achievement!=$user->id) 
            <img src="{{ $user->achievement }}" style="width:60px; height:25px;" alt="">
            @endif
          @endif
        </h5>
        <a href="{{ route('show.follow', $user->id) }}" style="color: black;">{{ count($user->follows) }} <span style="color:#A0A0A0; font-size:15px;">フォロー</span></a>
        <a href="{{ route('show.follower', $user->id) }}" style="color: black;">{{ count($user->followers) }} <span style="color:#A0A0A0; font-size:15px;">フォロワー</span></a>
      </div>
      <div class="d-inline d-sm-none col-5 text-left" style="margin:10px 0 0 15px;;">
        <h6 >
          {{ $user->name }}
          @if(isset($user->achievement))
            @if($user->achievement!=$user->id) 
            <img src="{{ $user->achievement }}" style="width:50px; height:20px;" alt="">
            @endif
          @endif
        </h6>
        <a href="{{ route('show.follow', $user->id) }}" style="color: black; margin-left:10px;">{{ count($user->follows) }} <span style="color:#A0A0A0; font-size:12px; ">フォロー</span></a><br>
        <a href="{{ route('show.follower', $user->id) }}" style="color: black; margin-left:10px;">{{ count($user->followers) }} <span style="color:#A0A0A0; font-size:12px; ">フォロワー</span></a>
      </div>
      <div class="col-4 text-left" style="margin:4px 0 0 -20px;">
        @if(Auth::check())
          <?php
          if($user->followers->isEmpty()) {
            $defaultFollowed = false;
          } else {
            foreach ($user->followers as $key => $follower) {
              if($userAuth->id == $follower->id) {
                $defaultFollowed = true;
                  break;
              } else {
                $defaultFollowed = false;
              }
            }
          }
          ?>
          @if($user->id!=$userAuth->id)
            <follow
            :follow-user="{{json_encode($user)}}"
            :auth-user="{{json_encode($userAuth)}}"
            :default-followed="{{json_encode($defaultFollowed)}}"
            ></follow>
          @endif
          <br>
        @endif 
        <!--<a  class="btn btn-md btn-primary" style="margin:8px; margin-left:10px; padding: 5px 10px;" href="{{ route('achievement.index') }}">称号</a><br>-->
        <h4 class="d-none d-sm-block" style="margin-top:10px;"><i class="fas fa-heart text-danger"></i>&nbsp;<?php echo $likesum; ?><br>
        <i class="far fa-images" style="margin-left:-3px;"></i>&nbsp;{{ count($user->posts) }}</h4>
        <h5 class="d-block d-sm-none" style="margin-top:5px;"><i class="fas fa-heart text-danger"></i>&nbsp;<?php echo $likesum; ?><br>
        <i class="far fa-images" style="margin-left:-3px;"></i>&nbsp;{{ count($user->posts) }}</h5>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach($user->posts as $post)
      <div class="col-6 col-sm-4 col-lg-3 adjustment">
        <div class="card">
          <a href="{{ route('posts.show', $post->id) }}">
            <img class="card-img-top img-responsive center-block" src="{{ asset('storage/image/'.$post->image) }}" alt="">
          </a>
          <div class="card-body text-center">
            <h5>
              <a class="text-secondary" href="{{ route('posts.show', $post->id) }}">
                {{ $post->title }}
              </a>
            </h5>
            <h6>
              <a class="text-secondary" href="{{ route('users.show', $post->user_id) }}">
              {{ $post->user->name }}
              </a>
            </h6>
            <h6>
              @foreach($post->tags as $tag)
                <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">
                    #{{ $tag->tag_name }}
                </a>
              @endforeach
            </h6>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection