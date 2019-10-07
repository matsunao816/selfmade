@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
  {{$tag_name}}
  </div>
</div>

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
  </div>
</div>
@endsection