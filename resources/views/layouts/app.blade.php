<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  
  <title>Nami Log</title>
  <!-- style -->
  <link href="/css/app.css" rel="stylesheet">
  
</head>
<body>
<header>
<nav class="navbar navbar-dark navbar-expand-md bg-dark ">
  <a href="{{ route('diary.index') }}" class="navbar-brand">Nami Log</a>
  <button class="navbar-toggler" type="button"
      data-toggle="collapse"
      data-target="#navmenu"
      aria-controls="navmenu"
      aria-expanded="false"
      aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navmenu">

    <!-- ログインしてない
      <div class="navbar-nav>
        <a class="nav-item nav-link" href="#">ログイン</a>
        <a class="nav-item nav-link" href="#">新規登録</a>
      </div>
    -->

    <div class="navbar-nav ">
      <a class="nav-item nav-link" href="#">About</a>
      <a class="nav-item nav-link" href="{{ route('diary.index') }}">タイムライン</a>
      <a class="nav-item nav-link" href="{{ route('diary.create') }}">日記投稿</a>
      <a class="nav-item nav-link" href="#">ユーザー一覧</a>
      <a class="nav-item nav-link" href="#">プロフィール</a>
      <!-- <a class="nav-item nav-link" href="#">ログアウト</a> -->
    </div>
  </div>
</nav>

  <!--<nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
    <a class="my-navbar-brand" href="{{ route('diary.index') }}">Nami Log</a>
    
  </nav> -->
</header>
  
  <main class="py-4 pt-5">
    @yield('content')
  </main>
</body>
</html>