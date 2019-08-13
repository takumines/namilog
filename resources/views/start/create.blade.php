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
</header>
  <main class="py-4 pt-5">
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
          <h1 class="text-center mb-5">スポット作成</h1>
        <!-- エラー処理 -->
        @include('partials.errors.form_errors')
        <form action="{{ route('start.create') }}" method="post">
          @csrf
          <!-- スポット名フォーム -->
          <div class="form-group">
            <label class="col-md-4" for="name">スポット名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>
          <!-- 都道府県入力フォーム -->
          <div class="form-group">
            <label class="col-md-3 mx-auto" for="place">都道府県</label>
            <input class="form-control" type="text" name="place" value="{{ old('place') }}">
          </div>
          <!-- メモ入力エリア -->
          <div class="form-group">
            <label class="col-md-3 mx-auto" for="body">特長メモ</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
          </div>
          <!-- 送信ボタン -->
          <div class="form-group">
            <div class="text-center">
              <button class="btn btn-lg  btn-primary" type="submit">完了</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </main>
</body>
</html>