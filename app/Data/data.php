<?php
namespace Data;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class Foo
{
  public function level()
  {
    $user = Auth::user();
    $likesum=0; 
    $postsum=0;
    $level=0;
    $levelpoint = 0;
    $levelpoint = ($likesum*5)+($postsum*1);
    foreach($user->posts as $post){
      $likesum+=count($post->likes);
      $postsum++;
    }
    if($levelpoint>=1000){
      $level=10;
    }
    elseif($levelpoint>=700){
      $level=9; 
    }
    elseif($levelpoint>=500){
      $level=8; 
    }
    elseif($levelpoint>=400){
      $level=7;
    }
    elseif($levelpoint>=250){
      $level=6;
    }
    elseif($levelpoint>=150){
      $level=5;
    }
    elseif($levelpoint>=80){
      $level=4;
    }
    elseif($levelpoint>=30){
      $level=3;
    }
    elseif($levelpoint>=10){
      $level=2;
    }
    else{
      $level=1;
    }
    return $level;
  }
  function convert_to_fuzzy_time($time_db){
    $unix   = strtotime($time_db);
    $now    = time();
    $diff_sec   = $now - $unix;

    if($diff_sec < 60){
        $time   = $diff_sec;
        $unit   = "秒前";
    }
    elseif($diff_sec < 3600){
        $time   = $diff_sec/60;
        $unit   = "分前";
    }
    elseif($diff_sec < 86400){
        $time   = $diff_sec/3600;
        $unit   = "時間前";
    }
    elseif($diff_sec < 2764800){
        $time   = $diff_sec/86400;
        $unit   = "日前";
    }
    else{
        if(date("Y") != date("Y", $unix)){
            $time   = date("Y年n月j日", $unix);
        }
        else{
            $time   = date("n月j日", $unix);
        }

        return $time;
    }
    return (int)$time .$unit;
  }
}
?>