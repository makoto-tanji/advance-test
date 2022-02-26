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
      <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
      <form action="/confirmation" method="get" name="contact-form" class="flex h-adr">
        <table>
          @csrf
          <tr>
            <th>
              お名前
              <span class="required">※</span>
            </th>
            <td>
              <div class="name-container flex">
                <input
                  type="text"
                  name="lastName"
                  required="required"
                  class="required-input"
                  placeholder="山田"
                  value="{{ old('lastName') }}"
                >
                <input
                  type="text"
                  name="firstName"
                  required="required"
                  class="required-input"
                  placeholder="太郎"
                  value="{{ old('firstName') }}"
                >
              </div>
              <div class="error-container">
                <p>えらー</p>
              </div>
              <div class="error-container">
                <p>えらー</p>
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
                <label class="gender-label">
                  <input
                    type="radio"
                    name="gender"
                    value=1
                    required="required"
                    class="gender-input"
                    checked
                  >
                  <span class="gender-text flex">男性</span>
                </label>
                <label class="gender-label">
                  <input
                    type="radio"
                    name="gender"
                    value=2
                    required="required"
                    class="gender-input"
                  >
                  <span class="gender-text flex">女性</span>
                </label>
              </div>
            </td>
          </tr>
          <tr>
            <th>
              メールアドレス
              <span class="required">※</span>
            </th>
            <td>
              <input
                type="email"
                name="email"
                required="required"
                class="required-input"
                placeholder="test@example.com"
                value="{{ old('email') }}"
              >
            </td>
          </tr>
          <tr>
            <th>
              郵便番号
            <span class="required">※</span>
            </th>
            <td>
              <div class="postcode-container flex">
                <span class="p-country-name" style="display:none;">Japan</span>
                <p>〒</p>
                <input
                  type="text"
                  name="postcode"
                  required="required"
                  maxlength="8"
                  class="postcode-input p-postal-code required-input"
                  placeholder="123-4567"
                  value="{{ old('postcode') }}"
                >
              </div>
              @if ($errors->has('postcode'))
              <p class="error-text">{{$errors->first('postcode')}}</p>
              @endif
            </td>
          </tr>
          <tr>
            <th>
              住所
              <span class="required">※</span>
            </th>
            <td>
              <input
                type="text"
                name="address"
                required="required"
                class="p-region p-locality p-street-address p-extended-address required-input"
                placeholder="東京都渋谷区千駄ヶ谷1-2-3"
                value="{{ old('address') }}"
              >
            </td>
          </tr>
          <tr>
            <th>建物名</th>
            <td>
              <input
                type="text"
                name="building"
                placeholder="千駄ヶ谷マンション101"
                value="{{ old('building') }}"
              >
            </td>
          </tr>
          <tr>
            <th>
              ご意見
            <span class="required">※</span>
            </th>
            <td>
              <textarea
                name="opinion"
                cols="24"
                rows="5"
                maxlength="120"
                class="required-input"
                placeholder="120文字以内"
              >{{ old('opinion') }}</textarea>
              @if ($errors->has('opinion'))
              <p class="error-text">{{$errors->first('opinion')}}</p>
              @endif
            </td>
          </tr>
        </table>
        <input type="submit" class="btn btn-confirm" value="確認">
      </form>
    </div>
  </div>
  @livewireScripts
</body>
</html>