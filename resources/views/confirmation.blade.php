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
  <!-- 追加終了 -->
</head>
<body>
  <div class="container flex">
    <h1 class="ttl">内容確認</h1>
    <div class="main-container flex">
      <form action="/confirmation" method="post" name="contact-form" class="flex">
        <table>
          @csrf
          <tr>
            <th>
              お名前
              <span class="required">※</span>
            </th>
            <td>
              <div class="name-container flex">
                <p>{{ $lastName . " " . $firstName }}</p>
              </div>
            </td>
          </tr>
          <tr>
            <th>
              性別
              <span class="required">※</span>
            </th>
            <td>
              <div class="gender-container flex">
                @if ($gender == 1)
                  <p>男性</p>
                @else
                  <p>女性</p>
                @endif
              </div>
            </td>
          </tr>
          <tr>
            <th>
              メールアドレス
              <span class="required">※</span>
            </th>
            <td>
              <p>{{ $email }}</p>
            </td>
          </tr>
          <tr>
            <th>
              郵便番号
            <span class="required">※</span>
            </th>
            <td>
              <div class="postcode-container flex">
                <p>{{ $postcode }}</p>
              </div>
            </td>
          </tr>
          <tr>
            <th>
              住所
              <span class="required">※</span>
            </th>
            <td>
              <p>{{ $address }}</p>
            </td>
          </tr>
          <tr>
            <th>建物名</th>
            <td>
              <p>{{ $building }}</p>
            </td>
          </tr>
          <tr>
            <th>
              ご意見
            <span class="required">※</span>
            </th>
            <td>
              <p>{{ $opinion }}</p>
            </td>
          </tr>
        </table>
        <input
          type="submit"
          name="store"
          class="btn btn-post"
          value="送信">
      </form>
    </div>
    <a href="/">修正する</a>
  </div>
</body>
</html>