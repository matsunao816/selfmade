@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    コメント
  </div>
</div>
<div class="container">
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comments.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="post_id" value="{{ $post_id }}">
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary text-center">投稿</button>
                </div>
            </form>
          </div>
        </div>
</div>
</div>
@endsection