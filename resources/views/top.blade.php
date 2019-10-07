@extends('layouts.index')

@section('content')

<div class="contents-frame">
  <div class="caption">
  <h1><i class="fas fa-leaf"></i> Selfmade</h1>
    <p>気になるイラストを探してみよう</p>
    <form method="get" action="{{ route('posts.search') }}" class="topsearch_container">
      <div class="input-group">
        <input class="top" type="text" size="50" placeholder="キーワード検索" name="search" >
        <input type="submit" value="&#xf002" >
      </div>
    </form>
    <div class="mause">
      <span ></span>
    </div>
  </div>
</div>
<!--イラスト一覧-->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="example">ランキング</div>
<div class="container">
  <div class="row">
  <?php $rankcard=1; ?>
  <?php $newcard=1; ?>
    @foreach($rankposts as $post)
    <!--card数の制限-->
      @if($rankcard<=8) 
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
              @foreach($post->tags as $tag)
                <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">
                    #{{ $tag->tag_name }}
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
      @endif
    @endforeach
    <a href="/ranking?page=1" class="col-12" style="text-align:right; margin-left:-10px;">もっと見る</a>
    <div class="col-12 example" style="margin:10px 0px;">新着</div>
    @foreach($newposts as $post)
      @if($newcard<=8) <!--card数の制限-->
      <div class="col-6 col-sm-4 col-lg-3 adjustment" >
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
              @foreach($post->tags as $tag)
                <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">
                    #{{ $tag->tag_name }}
                </a>
              @endforeach
            </h6>
            <i class="fas fa-heart text-danger"></i> {{ count($post->likes) }}<br>
            <?php 
            $time = $post->created_at;
            $gion = new Data\Foo();
            $time = $gion->convert_to_fuzzy_time($time);
            echo $time;
            ?>
          </div>
        </div>
      </div>
      <?php $newcard+=1; ?>
      @endif
    @endforeach
    <a href="{{ route('posts.newpost') }}" class="col-12" style="text-align:right; margin:0 0 30px -10px;">もっと見る</a>
  </div>
</div>
@endsection

