@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    新着
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach($posts as $post)
      <div class="col-6 col-sm-4 col-lg-3 adjustment">
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
    @endforeach
    
</div>
</div>
<div class="container">{{ $posts->links() }}</div>
@endsection
