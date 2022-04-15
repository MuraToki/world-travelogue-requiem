<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>世界旅行記とは｜世界旅行記</title>
    <link rel="shortcut icon" href="{{ asset('/favicon13.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body id="about_body" >

<main class="about-main">
  <div class="japanease rounded">
    <div class="about-title text-center pt-4">
      <h1><span class="span-about-ja fw-bold">世界旅行記とは</span></h1>
    </div>
    <div class="jp-passage">
      <div class="summary">
        <h4><span class="about-span-summary fw-bold"><i class="fa-solid fa-star"></i> 概要</span></h4>
        <p>このWebアプリは、国外や国内の旅行の思い出、観光した内容を書くものです。<br>国名と旅行の内容と画像を投稿することができます。<br>皆様の旅行の思い出、観光した国や場所を書いてください。<br>このWebアプリは無料で新規登録とログインができます。<br>ログインや新規登録が面倒くさいと思う人がいるでしょう。<br>その人達のために、ゲストユーザーとしてゲストログインできる機能も備えてあります。<br>このWebアプリを実際に使用するときも無料です。<br>ぜひ、あなたの旅行の思い出を投稿してください！
      </p>
    </div>
    
    <div class="attention">
      <h4><span class="about-span-attention fw-bold"><i class="fa-solid fa-skull-crossbones"></i> 注意点</span></h4>
      <nav>
        <ol>
          <li>卑猥や不誠実な画像は載せないでください。</li>
          <li>身分や住所を特定される画像は載せないでください。</li>
          <li>相手の気分を害するようなコメントはやめてください。</li>
        </ol>
      </nav>
  </div>
  
</div>

  <div class="about-btn text-center p-3">
    <a class="nav-link btn btn-outline-dark fw-bold fs-5" href="{{ url('/') }}"><i class="fas fa-home"></i> BACK</a>
  </div>
</main>
          
    
    
  </body>
</head>