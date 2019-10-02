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
    @yield('content')
  </main>
</body>
</html>