<!DOCTYPE html>
<html>
<head>
  <!-- ツイッターカード の設定 -->
  <meta name="twitter:card" content="summary_large_image" /> 
  <meta name="twitter:site" content="@449Mtu" /> 
  <meta property="og:url" content="https://www.selfmade.tokyo" /> 
  <meta property="og:title" content="Selfmade -イラスト投稿サイト-" /> 
  <meta property="og:image" content="https://cdn.pixabay.com/photo/2019/02/17/14/04/14-04-52-235_1280.jpg" /> 
  
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <title>Selfmade -イラスト投稿サイト-</title>
  <style>
    
    @-webkit-keyframes sdb {
      0% {
        -webkit-transform: translate(0, 0);
        opacity: 0;
      }
      40% {
        opacity: 1;
      }
      80% {
        -webkit-transform: translate(0, 20px);
        opacity: 0;
      }
      100% {
        opacity: 0;
      }
    }
    @keyframes sdb {
      0% {
        transform: translate(0, 0);
        opacity: 0;
      }
      40% {
        opacity: 1;
      }
      80% {
        transform: translate(0, 20px);
        opacity: 0;
      }
      100% {
        opacity: 0;
      }
    }
    #wrapper {
      width:100%;
      overflow:hidden;
    }
    .textarea{
      width:70%;
    }
    .form-group{
      display:block;
    }
    .text{
      text-align: center;
    }
    .sample {
      margin:0 auto;
      text-align: center;
      display: block;
    }
    .text {
      text-align: left;
      display: inline-block;
    }
    html{
      font-family: "Tsukushi B Round Gothic","筑紫B丸ゴシック";
    }
    header{
      background-color:#FAFAFA;
    }
    li{
      margin:0 5px 0 0;
    }
    label > input {
      display:none;	/* アップロードボタンのスタイルを無効にする */
    }
    .container-fluid{
    max-width: 500px;
    }
    @keyframes onAutoFillStart { from {} to {}}
    input.top:-webkit-autofill {
        animation-name: onAutoFillStart;
        transition: background-color 50000s ease-in-out 0s;
        -webkit-text-fill-color: white !important;
    }
    input.sub:-webkit-autofill {
      animation-name: onAutoFillStart;
      transition: background-color 50000s ease-in-out 0s;
      -webkit-text-fill-color: white !important;
    }
    input.form:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset;
    }
    /*検索フォームのplaceholder*/
    input::placeholder {
    color: #AAAAAA;
    }
    /* IE */
    input:-ms-input-placeholder {
      color: #AAAAAA;
    }
    /* Edge */
    input::-ms-input-placeholder {
      color: #AAAAAA;
    }
    
    .contents-frame::before {
      content: '';
      background-color: rgba(0,0,0,.5);
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }
    .subcontents-frame {
      background-attachment: fixed;
      background-image: url(/img/subtop2.png) ;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .subcontents-frame::before {
      content: '';
      background-color: rgba(0,0,0,.3);
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
    }
    .content{
      background-color:#EEEEEE;
    }
    .icon{
      border-radius: 50%;  /* 角丸半径を50%にする(=円形にする) */
    }
    .inline {
      margin:5px;
      text-align: center;
    }
    .btn-wrapper {
      margin: 20px;
    }
    .btn-wrapper a{
      margin: 10px;
    }
    .btn {
      transition: 0.5s ;
      opacity:1;
    }
    .btn:hover {
      transition: 0.5s ;
      opacity:0.8;
    }
    .nav-item{
      margin:0 -5px;
    }
    .brand{
        font-size:35px;
        font-weight:bold;
        font-family: 'Caveat', cursive;
    }
    .brand i{
        font-size:25px;
    }
    .topsearch_container input[type="text"]{
      border: none;
      height: 2.6em;
      background: none;
      color:white;
    }
    .topsearch_container input[type="text"]:focus {
      outline: 0;
    }
    .topsearch_container input[type="submit"]{
      cursor: pointer;
      font-family: FontAwesome;
      font-size: 1.7em;
      border: none;
      background: none;
      color: #FFFFFF;
      position: absolute;
      width: 1.5em;
      height: 2.2em;
      right: 0;
      top: -10px;
      outline : none;
      }
    .search_container input[type="text"]{
      border: none;
      height: 2.6em;
      background: none;
      color:white;
    }
    .search_container input[type="text"]:focus {
      outline: 0;
    }
    .search_container input[type="submit"]{
      cursor: pointer;
      font-family: FontAwesome;
      font-size: 1.7em;
      border: none;
      background: none;
      color: #FFFFFF;
      position: absolute;
      width: 1.5em;
      height: 2.2em;
      right: 0;
      top: -10px;
      outline : none;
      }
    .aiu{
        margin:10px 0 0 10px;
    }
    .adjustment{
      padding:8px;
    }
    @media screen and (min-width: 769px){
      .contents-frame {
      background-attachment: fixed;
      background-image: url(/img/top.jpg) ;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      }
      .example {
        font-size: 30px;
        text-align: center;
        margin:30px 0 15px 0;
        font-weight:bold;
      }
      .caption{
        margin: 260px 0 275px 0;
        color:white;
        z-index:1;
      }
      .caption h1{
        margin-bottom:30px;
        font-size:100px;
        font-weight:bold;
        font-family: 'Caveat', cursive;
      }
      .caption h1 i{
        font-size:80px;
      }
      .caption p{
        font-size:30px;
      }
      .subcaption{
      margin: 160px 0 70px 0;
      color:white;
      z-index:1;
      font-size:40px;
      }
      .inline li a{
        font-size:20px;
      }
      .inline li {
        display: inline;
        margin:20px;
      }
      .img-responsive {
        display: block;
        height: 350px;
        max-width: 100%;
        object-fit: contain;
        background-color:#F8F8F8;
      }
      .title-border {
        display: flex;
        align-items: center;
        justify-content: center;  //全幅で線を引く場合は不要。
      }
      .title-border:before,
      .title-border:after {
        border-top: 1px solid;
        content: "";
        width:4em; //全幅で線を引く場合は不要。
      }
      .title-border:before {
        margin-right: 1rem;
      }
      .title-border:after {
        margin-left: 1rem;
      }
      .img-pro{
        height: 500px;
        max-width: 100%;
        object-fit: contain;
        text-align:center;
      }
      .topsearch_container{
      box-sizing: border-box;
      position: relative;
      border: 1px solid #999;
      padding: 3px 10px;
      border-radius: 20px;
      height: 3em;
      width: 450px;
      overflow: hidden;
      }
      .search_container{
      box-sizing: border-box;
      position: relative;
      border: 1px solid #999;
      padding: 3px 10px;
      border-radius: 20px;
      height: 3em;
      width: 300px;
      overflow: hidden;
      margin-right:-30px;
      }
      .mause span {
      margin-top:700px;
      position: absolute;
      top: 0;
      left: 50%;
      width: 30px;
      height: 50px;
      margin-left: -15px;
      border: 2px solid #fff;
      border-radius: 50px;
      box-sizing: border-box;
      }
      .mause span::before {
        position: absolute;
        top: 10px;
        left: 50%;
        content: '';
        width: 6px;
        height: 6px;
        margin-left: -3px;
        background-color: #fff;
        border-radius: 100%;
        -webkit-animation: sdb 2s infinite;
        animation: sdb 2s infinite;
        box-sizing: border-box;
      }
    }
    @media screen and (max-width:768px)  {
      .contents-frame {
      background-attachment: fixed;
      background-image: url(/img/top.jpg) ;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }
      .example {
        font-size: 25px;
        text-align: center;
        margin:25px;
        font-weight:bold;
      }
      .caption{
      margin: 130px 0 140px 0;
      color:white;
      z-index:1;
      }
      .caption h1{
        margin-bottom:20px;
        font-size:60px;
        font-weight:bold;
        font-family: 'Caveat', cursive;
      }
      .caption h1 i{
        font-size:50px;
      }
      .caption p{
        font-size:20px;
      }
      .subcaption{
      margin: 140px 0 50px 0;
      color:white;
      z-index:1;
      font-size:20px;
      }
      .inline li {
      display: inline;
      margin:15px;
      }
      .inline li a{
      font-size:20px;
      }
      .img-responsive {
      display: block;
      height: 180px;
      max-width: 100%;
      object-fit: contain;
      background-color:#F8F8F8;
      }
      .title-border {
        display: flex;
        align-items: center;
        justify-content: center; 
      }
      .title-border:before,
      .title-border:after {
        border-top: 1px solid;
        content: "";
        width:2em;
      }
      .title-border:before {
        margin-right: 1rem;
      }
      .title-border:after {
        margin-left: 1rem;
      }
      .img-pro{
        height: 300px;
        max-width: 100%;
        object-fit: contain;
        text-align:center;
      }
      .topsearch_container{
      box-sizing: border-box;
      position: relative;
      border: 1px solid #999;
      padding: 3px 10px;
      border-radius: 20px;
      height: 3em;
      width: 300px;
      overflow: hidden;
      } 
      .search_container{
      box-sizing: border-box;
      position: relative;
      border: 1px solid #999;
      padding: 3px 10px;
      border-radius: 20px;
      height: 3em;
      width: 220px;
      overflow: hidden;
      margin-right:-30px;
      }
      .brand{
        font-size:35px;
        font-weight:bold;
        font-family: 'Caveat', cursive;
        margin-left:-15px;
      }
    }
    @media screen and (max-width: 376px) {

      .contents-frame {
      background-attachment: scroll;
      }
      .topsearch_container{
      box-sizing: border-box;
      position: relative;
      border: 1px solid #999;
      padding: 3px 10px 3px 0;
      border-radius: 20px;
      height: 3em;
      width: 250px;
      overflow: hidden;
      margin-left:20px;
      }
      .search_container{
      box-sizing: border-box;
      position: relative;
      border: 1px solid #999;
      padding: 3px 10px 3px 0;
      border-radius: 20px;
      height: 3em;
      width: 160px;
      overflow: hidden;
      margin-right:-30px;
      }
      .brand{
        font-size:30px;
        font-weight:bold;
        font-family: 'Caveat', cursive;
        margin-left:-15px;
      }
      .brand i{
          font-size:20px;
      }
      .aiu{
        margin:4px 0 0 3px;
      }
      .subcaption{
      margin: 130px 0 50px 0;
      color:white;
      z-index:1;
      font-size:25px;
      }
      .text{
      text-align: right;
      }
      .textarea{
      width:85%;
      }
      .adjustment{
      padding:0px;
    }
    }
  }
  </style>
</head>
<body>
  <div id="wrapper">
    <div id="app">
    <!--ログイン中のユーザーidの取得-->
      <?php 
      $user = Auth::user(); $id = Auth::id(); 
      $url = $_SERVER['REQUEST_URI'];
      ?>
      <!--もしトップページなら-->
      @if($url=="/")  
      <nav class="navbar navbar-dark fixed-top" style="position: absolute; margin-top:10px">
        <div class="container">
          <a class="navbar-brand" href="/" style="margin-left: -15px;"></a>
          <ul class="nav" style="margin-right:-30px">      
            @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('posts.create') }}">イラスト投稿</a>      
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('profiles.index') }}">プロフィール</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link text-light" href="/login">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/register">会員登録</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link text-light">
                <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <input type="hidden" name="email" value="gest@gest.com"> 
                  <input type="hidden" name="password" value="gestgest"> 
                  <input class="text-light d-none d-sm-block" type="submit" value="自動ログイン(企業様)" style="border:none; background-color:transparent;">
                </form> 
              </a>
                <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="email" value="gest@gest.com"> 
                  <input type="hidden" name="password" value="naoki0409"> 
                      <button type="submit" >
                          {{ __('自動ログイン(企業様)') }}
                      </button>
                </form>  -->
            </li> -->
            @endif
          </ul>
        </div>
      </nav>
      <!--トップページ以外なら-->
      @else
      <nav class="navbar navbar-dark fixed-top" style="position: absolute;">
        <div class="container">
          <ul class="nav">
            <li class="nav-item">
              <a class="navbar-brand" href="/">
                <div class="brand"><i class="fas fa-leaf"></i> Selfmade</div>
              <a>
            </li>
          <!--検索フォーム-->
            <li class="nav-item aiu" >
              <form method="get" action="{{ route('posts.search') }}" class="search_container">
                <div class="input-group" >
                  <input class="sub" type="text" size="30" placeholder="キーワード検索" name="search" >
                  <input type="submit" value="&#xf002" >
                </div>
              </form>
            </li>
          </ul>
          <ul class="nav" style="margin-left:-30px;">
            @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('posts.create') }}">イラスト投稿</a>   
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{ route('profiles.index') }}">プロフィール</a>
            </li>
            @else
            <li class="nav-item" >
              <a class="nav-link text-light" href="/login">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/register">会員登録</a>
            </li>
            @endif
          </ul>
        </div>
      </nav>
      @endif
      <div class="content">
        @yield('content')
      </div>
      <!--フッター-->
      <footer class="py-4 bg-dark text-light">
        <div class="container text-center">
          <ul class="nav justify-content-center" style="font-size:20px;">
            <!--<li class="nav-item" style="margin:1px;">
              <a class="nav-link" href="https://twitter.com/449Mtu"><i class="fab fa-twitter"></i></a>
            </li>-->
            <li class="nav-item" style="margin:1px;">
              <a class="nav-link" href="mailto:matsunao816@gmail.com"><i class="fas fa-envelope"></i></a>
            </li>
          </ul>
          <p><small>Selfmade@2019</small></p>
        </div>
      </footer>
    </div>
  </div>
</body>
</html>