@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    ランキング
  </div>
</div>
<!--イラスト一覧-->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<!--ランキング表示-->
<?php 
  $rankcard=1; 
  $url = $_SERVER['REQUEST_URI']; 
  $url = preg_replace('/[^0-9]/', '', $url); 
  $url = ($url-1)*20;
  $rankcard+=$url;
?>

<div class="container">
  <div class="row">
    @foreach($rankposts as $post)
      <div class="col-6 col-sm-4 col-lg-3 adjustment">
      <h5 style="text-align:center;">
        @if($rankcard==1)
          <img src="/img/rank1.png">
        @elseif($rankcard==2)
          <img src="/img/rank2.png">
        @elseif($rankcard==3)
          <img src="/img/rank3.png">
        @else
          <div style="margin-top:24px;">{{$rankcard}}位</div>
        @endif
      </h5>
        <div class="card">
          <a href="{{ route('posts.show', $post['id']) }}">
            <img class="card-img-top img-responsive center-block" src="{{ asset('storage/image/'.$post['image']) }}" alt="">
          </a>
          <div class="card-body text-center">
            <h5>
              <a class="text-secondary" href="{{ route('posts.show', $post['id']) }}">
                {{ $post['title'] }}
              </a>
            </h5>
            <h6>
            @if($post->user==Auth::user())
              <a class="text-secondary" href="{{ route('profiles.index') }}">
              @if(isset($post->user->icon))
                <img src="{{ asset('storage/image/'.$post->user->icon) }}" style="border-radius: 50%; width:30px; height:30px;" alt=""> 
              @else
                <img src="/img/icon.jpg" style="border-radius: 50%; width:30px; height:30px;" alt="">
              @endif
              {{ $post->user->name }}
              </a>
            @else
              <a class="text-secondary" href="{{ route('users.show', $post->user_id) }}">
              @if(isset($post->user->icon))
                <img src="{{ asset('storage/image/'.$post->user->icon) }}" style="border-radius: 50%; width:30px; height:30px;" alt=""> 
              @else
                <img src="/img/icon.jpg" style="border-radius: 50%; width:30px; height:30px;" alt="">
              @endif
              {{ $post->user->name }}
              </a>
            @endif
            </h6>
            <h6>
              @foreach($post['tags'] as $tag)
                <a href="{{ route('posts.index', ['tag_name' => $tag['tag_name']]) }}">
                    #{{ $tag['tag_name'] }}
                </a>
              @endforeach
            </h6>
            <i class="fas fa-heart text-danger"></i> {{ count($post->likes) }}&nbsp;
            <span style="color:#808080; font-size:15px;">
              <?php 
              //投稿時間表示
              $time = $post->created_at;
              $gion = new Data\Foo();
              $time = $gion->convert_to_fuzzy_time($time);
              echo $time;
              ?>
            </span>
          </div>
        </div>
      </div>
      <?php $rankcard+=1; ?>
    @endforeach
</div>
</div>

<div class="container">{{ $rankposts->links() }}</div>
@endsection
