@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    イラスト一覧
  </div>
</div>
<!--検索が空白でない＆検索結果が１件以上-->
@if ( !empty($search_query) && ($posts->total()) != 0 )
  @isset($search_result)
    <h4 style="text-align: center; margin:30px">{{ $search_result }}</h4>
  @endisset
  <div class="container">
    <div class="row">
        @foreach($posts as $post)
          <div class="col-6 col-sm-4 col-lg-3" style="padding:8px;">
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
      @if(isset($search_query))
          {{ $posts->appends(['search' => $search_query])->links() }}
      @else
          {{ $posts->links() }}
      @endif
    </div>
  </div>
@else
  <div class="d-none d-sm-block" style="text-align: center; padding:100px;">
    <img  src="/img/photo.png"><br>
    <h3 style="margin-top:15px;">作品がありません</h3>
  </div>
  <div class="d-block d-sm-none" style="text-align: center; padding:100px;">
    <img  src="/img/photo.png"><br>
    <h5 style="margin-top:15px;">作品がありません</h5>
  </div> 
@endif
@endsection