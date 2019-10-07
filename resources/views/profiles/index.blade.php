@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    プロフィール
  </div>
</div>

<?php 
$likesum=0; 
$postsum=0;
foreach($user->posts as $post){
  $likesum+=count($post->likes);
  $postsum++;
}
?>

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
        <a href="{{ route('show.follow', Auth::user()->id) }}" style="color: black;">{{ count($user->follows) }} <span style="color:#A0A0A0; font-size:15px;">フォロー</span></a>
        <a href="{{ route('show.follower', Auth::user()->id) }}" style="color: black;">{{ count($user->followers) }} <span style="color:#A0A0A0; font-size:15px;">フォロワー</span></a>
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
        <a href="{{ route('show.follow', Auth::user()->id) }}" style="color: black; margin-left:10px;">{{ count($user->follows) }} <span style="color:#A0A0A0; font-size:12px; ">フォロー</span></a><br>
        <a href="{{ route('show.follower', Auth::user()->id) }}" style="color: black; margin-left:10px;">{{ count($user->followers) }} <span style="color:#A0A0A0; font-size:12px; ">フォロワー</span></a>
      </div>
      <div class="col-4 text-left" style="margin:10px 0 0 -15px;">
        <h4 class="d-none d-sm-inline"><i class="fas fa-heart text-danger"></i>&nbsp;<?php echo $likesum; ?><br>
        <i class="far fa-images" style="margin-left:-3px;"></i>&nbsp;{{ count($user->posts) }}</h4>
        <h5 class="d-inline d-sm-none"><i class="fas fa-heart text-danger"></i>&nbsp;<?php echo $likesum; ?><br>
        <i class="far fa-images" style="margin-left:-3px;"></i>&nbsp;{{ count($user->posts) }}</h5>
        <div class="d-none d-sm-inline"  href="{{ route('logout') }}"   
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <h6 style="margin-top:8px;"><a class="text-secondary" href="/"><img style="width:20px;height:20px;" src="/img/logout.png">ログアウト</a></h6> 
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
        </form>
        <div class="d-inline d-sm-none" href="{{ route('logout') }}"   
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <small><a class="d-inline d-sm-none text-secondary" href="/"><img style="width:15px;height:15px;" src="/img/logout.png">ログアウト</a></small> 
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
<div class="example">イラスト一覧</div>
  @if($postsum==0)
  <div style="text-align: center; margin:100px;"><img  src="/img/photo.png"><br>
  <h3 style="margin-top:15px;">作品がありません</h3></div>
 @endif
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
            <form action="{{ route('profiles.destroy', $post->id) }}" method="post">
                <a class="btn btn-sm btn-success" href="{{ route('posts.show', $post->id) }}" style="margin:3px">詳細</a>
                <a class="btn btn-sm btn-warning" href="{{route('profiles.edit',$post->id)}}" style="margin:3px">編集</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" style="margin:3px">削除</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection