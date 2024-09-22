<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  @yield('styles')
  
</head>
<body>
  <header class="header">
    <div class="logo">
      <a href="{{ route('home') }}" class="logo-link">
        <div class="logo-img">
          <img src="{{ asset('images/logo.webp') }}" alt="Haru.のロゴ">
        </div>
        <h1 class="header-title">島のお宿 Haru.</h1>
      </a>
    </div>
    <nav>
      <ul class="nav-menu">
        <li><a href="{{ route('haru') }}" class="nav-list">Haruについて</a></li>
        <li><a href="{{ route('public_blog_lists') }}" class="nav-list">ブログ一覧</a></li>
        <li><a href="" class="nav-list">言語</a></li>
        <li><a href="" class="nav-list">ご予約</a></li>
      </ul>
    </nav>
  </header>
  @yield('content')
  <footer>
    <p>©2024 Haru.</p>
  </footer>
  @yield('scripts')
</body>
</html>
