<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ config('app.name', 'Nami Log') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet" type="text/css">

    <!-- style -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">

  </head>
<body>
  <nav class="navbar navbar-dark navbar-expand-md bg-info ">
        <a href="{{ route('diary.list') }}" class="navbar-brand">Nami Log</a>
        @if(Auth::check())
          <div class="nav-item">ようこそ、{{ Auth::user()->name }}さん</div>
        @endif
        <button class="navbar-toggler" type="button"
            data-toggle="collapse"
            data-target="#navmenu"
            aria-controls="navmenu"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navmenu">
          @if(Auth::guest())
            
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('login') }}">ログイン</a>
                <a class="nav-item nav-link" href="{{ route('register') }}">新規登録</a>
              </div>
          @else
            <div class="navbar-nav ">
              <a class="nav-item nav-link" href="{{ route('diary.list') }}">タイムライン</a>
              <a class="nav-item nav-link" href="{{ route('diary.create') }}">日記投稿</a>
              <a class="nav-item nav-link" href="{{ route('user.list') }}">ユーザー一覧</a>
              <a class="nav-item nav-link" href="{{ route('user.show', ['id' => Auth::user()->id]) }}">プロフィール</a>
              <a class="nav-item nav-link" href="{{ route('logout') }}" id="logout" 
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          @endif
        </div>
      </nav>
  </header>
  
  <main>
    @yield('content')
  </main>
</body>
</html>