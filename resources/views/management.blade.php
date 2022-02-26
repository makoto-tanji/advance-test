<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
  <!-- 追加以下 -->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/management-style.css"/>
  <!-- 追加終了 -->
</head>
<body>
  <div class="container flex">
    <h1 class="ttl">管理システム</h1>
    <div class="main-container">
      <div class="search-container">
        <form action="/management" method="get" name="contact-form" class="flex">
          <table>
            @csrf
            <tr>
              <th>お名前</th>
              <td>
                <input
                  type="text"
                  name="fullname"
                  placeholder="山田 太郎"
                >
              </td>
            </tr>
            <tr>
              <th>性別</th>
              <td>
                <div class="gender-container flex">
                  <label class="gender-label">
                    <input
                      type="radio"
                      name="gender"
                      value=0
                      class="gender-input"
                      checked
                    >
                    <span class="gender-text flex">全て</span>
                  </label>
                  <label class="gender-label">
                    <input
                      type="radio"
                      name="gender"
                      value=1
                      class="gender-input"
                    >
                    <span class="gender-text flex">男性</span>
                  </label>
                  <label class="gender-label">
                    <input
                      type="radio"
                      name="gender"
                      value=2
                      class="gender-input"
                    >
                    <span class="gender-text flex">女性</span>
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <th>登録日</th>
              <td>
                <div class="date-container flex">
                  <input
                    type="date"
                    name="dateFrom"
                  >
                  <p>～</p>
                  <input
                    type="date"
                    name="dateBy"
                  >
                </div>
              </td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td>
                <!-- ドメインのみ入力など部分一致ができるようにtype="text"とする -->
                <input
                  type="text"
                  name="email"
                  placeholder="test@example.com"
                >
              </td>
            </tr>
          </table>
          <input type="submit" class="btn confirm-btn" value="検索">
          <input type="reset" class="btn reset-btn">
        </form>
      </div>
      <div class="result-container">
        <div class="pagination-container">
          {{ $items->appends(request()->query())->links() }}
        </div>
        <table class="result-table">
          <tr>
            <th>ID</th>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th class="opinion-column">ご意見</th>
            <th>削除</th>
          </tr>
          @if (@isset($items))
            @foreach ($items as $item)
              <tr>
                <td><p>{{ $item->id }}</p></td>
                <td><p>{{ $item->fullname }}</p></td>
                <td><p>{{ $item->showGender() }}</p></td>
                <td><p>{{ $item->email }}</p></td>
                <td><p class="opinion-text" title={{$item->opinion}}>{{ $item->opinion }}</p></td>
                <td>
                  <form action="/delete?id={{$item->id}}" method="POST">
                    @csrf
                    <input type="submit" class="btn delete-btn" value="削除">
                  </form>
                </td>
              </tr>
            @endforeach
          @endif
        </table>
      </div>
    </div>
  </div>
</body>
</html>