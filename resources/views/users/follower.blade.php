@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    フォロワー
  </div>
</div>
@if(count($followers)==0)
  <div style="text-align: center; padding:100px 0;"><img  src="/img/follow.png"><br>
  <h5 style="margin-top:15px;">フォロワーはいません</h5></div>
@endif
<div class="container">
  <div class="row">
    @foreach($followers as $follower)
    <div class="col-6 col-sm-4 col-lg-3 text-center" >
      <a class="text-secondary" href="{{ route('users.show', $follower->id) }}">
        @if(isset($follower->icon))
          <img src="{{ asset('storage/image/'.$follower->icon) }}" style="border-radius: 50%; width:70px; height:70px;" alt=""> 
        @else
          <img src="/img/icon.jpg" style="border-radius: 50%; width:70px; height:70px;" alt="">
        @endif
        {{ $follower->name }}
        @if(isset($follower->achievement))
            @if($follower->achievement!=$follower->id) 
            <img src="{{ $follower->achievement }}" style="width:50px; height:20px;" alt="">
            @endif
          @endif
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
