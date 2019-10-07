@extends('layouts.index')

@section('content')

<?php
$gion = new Data\Foo();
$level = $gion->level();
$likesum=0; 
$postsum=0;
?>
@foreach($user->posts as $post)
<?php $likesum+=count($post->likes)?>
<?php $postsum++;?>
@endforeach
<div class="subcontents-frame">
  <div class="subcaption title-border">
    称号
  </div>
</div>
<div >
  <form action="{{ route('achievement.update',$user->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
    <div >
      <div class="form-group" style="text-align:center;">
        <achievement
        likesum="{{$likesum}}"
        postsum="{{$postsum}}"
        level="{{$level}}"
        ></achievement>
      </div>
    </div>
      <div class="form-group" style="text-align:center; padding-bottom:30px; margin-bottom:-10px;" >
        <button type="submit" class="btn btn-primary btn-lg text-center" style="padding:5px 30px;">
        <input type="hidden" >
            {{ __('保存') }}
        </button>
        </div>
      </div>
    </div>
  </form> 
</div>
@endsection