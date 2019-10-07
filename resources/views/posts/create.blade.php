@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    作品投稿
  </div>
</div>
<div class="container-fluid">
  @if ($errors->any())
    <div class="alert alert-danger" style="margin-top:20px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group" style="text-align:center;">
        <file></file>
    </div>
    <div class="form-group" style="padding:8px;">
      <input type="text" class="form form-control" placeholder="タイトル" name="title">
    </div>
    <div class="form-group" style="padding:8px;">
        <!--<testaa></testaa>-->
      <textarea class="form form-control" rows="3" placeholder="キャプション" name="content"></textarea>
    </div>
    <div class="form-group" style="padding:8px;">
      <input type="text" class="form form-control" placeholder="タグ　(例:#猫 #オリジナル)" name="tag"> 
    </div>

    <div class="form-group text-center" style="margin:20px 0 0 -20px; padding-bottom:30px;">
        <button type="submit" class="btn btn-primary btn-lg" style="padding:5px 50px;">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            {{ __('投稿') }}
        </button>
    </div>
  </form>  
</div>
@endsection