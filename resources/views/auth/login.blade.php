@extends('layouts.index')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="subcontents-frame">
  <div class="subcaption title-border">
    ログイン
  </div>
</div>
<div class="container-fluid" style="margin-top:30px;">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email" class="col-form-label text-md-right" style="font-weight:bold;">{{ __('メールアドレス') }}</label>
        <input id="email" type="email" class="form form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="メールアドレス"name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password" class="col-form-label text-md-right" style="font-weight:bold;">{{ __('パスワード') }}</label>
        <input id="password" type="password" class="form form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="パスワード" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group text-center" >
        <button type="submit" class="btn btn-primary">
            {{ __('ログイン') }}
        </button>
    </div>
  </form>  
    <div class="container text-center" style="padding:30px;">
    初めてご利用の方 <a class="text-center" href="/register">(新規会員登録)</a>
    </div>
</div>
@endsection
