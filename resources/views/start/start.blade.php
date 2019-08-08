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
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">
              まずはお気に入りのスポットを登録しよう！
            </div>
            <div class="panel-body">
              <div class="text-center">
                <a href="{{ route('start.create') }}" class="btn btn-primary">
                  スポットを登録する
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  
  </main>
</body>
</html>