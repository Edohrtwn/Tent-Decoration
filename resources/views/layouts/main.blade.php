<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tent Decoration</title>
  <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="!scroll-smooth">
  @include('partials.navbar')

  <main>
    <div>
      @yield('container')
    </div>
  </main>

  @include('partials.footer')

  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
  <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>