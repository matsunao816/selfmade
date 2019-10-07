@extends('layouts.index')

@section('content')
<div class="subcontents-frame">
  <div class="subcaption title-border">
    フォロー
  </div>
</div>
@if(count($follows)==0)
  <div style="text-align: center; padding:100px 0;"><img  src="/img/follow.png"><br>
  <h5 style="margin-top:15px;">フォローはいません</h5></div>
@endif
<div class="container">
  <div class="row">
    @foreach($follows as $follow)
    <div class="col-6 col-sm-4 col-lg-3 text-center" >
      <a class="text-secondary" href="{{ route('users.show', $follow->id) }}">
        @if(isset($follow->icon))
          <img src="{{ asset('storage/image/'.$follow->icon) }}" style="border-radius: 50%; width:70px; height:70px;" alt=""> 
        @else
          <img src="/img/icon.jpg" style="border-radius: 50%; width:70px; height:70px;" alt="">
        @endif
        {{ $follow->name }}
        @if(isset($follow->achievement))
            @if($follow->achievement!=$follow->id) 
            <img src="{{ $follow->achievement }}" style="width:50px; height:20px;" alt="">
            @endif
          @endif
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
