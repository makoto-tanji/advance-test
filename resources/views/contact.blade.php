<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
  <!-- 追加以下 -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css"/>
  @livewireStyles
  <!-- 追加終了 -->
</head>
<body>
  <div class="container flex">
    <h1 class="ttl">お問い合わせ</h1>
    <div class="main-container ">
      <livewire:contact-form />
    </div>
  </div>
  @livewireScripts
</body>
</html>