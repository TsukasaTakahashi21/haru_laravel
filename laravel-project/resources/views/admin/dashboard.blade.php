<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サイト管理画面</title>
</head>
<body>
    <section class="admin-management">
      <h1>サイト管理画面</h1>
      <ul>
        <li><a href="">ブログ作成</a></li>
        <li><a href="">ブログ一覧</a></li>
        <li><a href="">ブログ詳細</a></li>
        <li><a href="">予約一覧</a></li>
        <li><a href="">予約詳細</a></li>
        <li><form action="{{ route('admin.logout') }}" method="POST" class="submit-button">
          @csrf
          <button type="submit">ログアウト</button></form>
        </li>
      </ul>
    </section>
</body>
</html>
