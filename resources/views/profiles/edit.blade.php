@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    編集
  </div>
</div>
<div class="container-fluid">
  <!--エラーがあった場合-->
  @if ($errors->any())
    <div class="alert alert-danger" style="margin-top:20px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('profiles.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
    <div class="form-group" style="text-align:center;">
      <label class="btn btn-danger btn-lg" style="margin:30px 0 15px -20px;">
        ファイルを選択
        <input type="file" name="image" >
      </label>
    </div>
    <div class="form-group">
    <input type="text" class="sub form-control" placeholder="タイトル" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <textarea class="sub form-control" rows="3" placeholder="キャプション" name="content">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
      <input type="text" class="sub form-control" placeholder="タグ　(例:#猫 #オリジナル)" name="tag" value="{{$post->tag}}"> 
    </div>

    <div class="form-group text-center" style="padding:20px; margin-left:-20px;">
        <button type="submit" class="btn btn-primary btn-lg" style="padding:5px 50px;">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            {{ __('保存') }}
        </button>
    </div>
  </form>  
</div>
@endsection