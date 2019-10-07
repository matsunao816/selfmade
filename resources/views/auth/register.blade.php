@extends('layouts.index')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="subcontents-frame">
  <div class="subcaption title-border">
    会員登録
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
  <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-form-label text-md-right" style="font-weight:bold;">{{ __('お名前') }}</label>
        <input id="name" type="text" class="form form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email" class="col-form-label text-md-right" style="font-weight:bold;">{{ __('メールアドレス') }}</label>
        <input id="email" type="email" class="form form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password" class="col-form-label text-md-right" style="font-weight:bold;">{{ __('パスワード') }}</label>
        <input id="password" type="password" class="form form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password-confirm" class="col-form-label text-md-right" style="font-weight:bold;">{{ __('パスワード(確認用)') }}</label>
        <input id="password-confirm" type="password" class="form form-control" name="password_confirmation" required>
    </div>
    <div class="text-center" style="padding:30px;">
        <button type="submit" class="btn btn-primary">
            {{ __('登録') }}
        </button>
    </div>
  </form>  
</div>
@endsection
