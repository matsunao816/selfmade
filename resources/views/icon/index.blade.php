@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    アイコン
  </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger" style="margin-top:20px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
<form action="{{ route('icon.update',$user->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
    
    <div class="form-group" style="text-align:center;">
    @if(isset($user->icon))
      <img src="{{ asset('storage/image/'.$user->icon) }}" style="border-radius: 50%; width:200px; height:200px; margin:10px;" alt="">
    @else
      <img src="/img/icon.jpg" style="border-radius: 50%; width:200px; height:200px; margin:10px;" alt="">
    @endif
      <icon></icon>
    </div>
    <div class="text-center" style="padding:20px; ">
        <button type="submit" class="btn btn-primary btn-lg" style="padding:5px 50px;">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            {{ __('保存') }}
        </button>
    </div>
  </form>  
@endsection