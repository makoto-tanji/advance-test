## 概要

Advanceテスト課題

Laravelを使った問い合わせフォーム

## 要件

### 確認を押す前に入力した段階でエラーを出すようにしてください。

* Livewireを使用
* コンポーネント「ContactFrom」を作成
  * 「ContactForm.php」内にバリデーションルールを記述
  * 郵便番号を入力した際は、自動住所取得処理を待つ
  * 「contact-form.blade.php」内にフォームを全て記述
  * 「contact.blade.php」にレンダリング

### 入力がない場合は確認ボタンを押してもエラーメッセージを出力

inputのrequired属性で対応。

### 性別は男性をデフォルトでチェック

input内に「checked」を指定。

### メールアドレスはメールアドレス形式でないとエラーを出力

「ContactForm.php」内のバリデーションルールを

```
'email' => 'required | email',
```

と指定。

また、inputのtype属性をemailとすることで、送信時にもエラー出力。

### 郵便番号はハイフンありの半角で、8文字以外の場合はエラー出力

* ContactForm.php」内のバリデーションルールで正規表現を使用。
* 「12345678」、「1234567-」、「123456-7」という形でもエラー出力

```
 'postcode' => 'required | between:8,8 | regex:/[0-9]{3}+-[0-9]{4}/' ,
```

### 郵便番号が全角の場合は自動で半角に変換

作成したフォームリクエスト「ContactRequest.php」内のprepareForValidation()でデータを加工。

mb_convert_kanaでオプションに「a」を指定。全角英数字を半角に変換。

### 郵便番号で検索した結果が住所の項目に自動で反映

* YubinBango.jsを使用
  * 「contact-form.php.blade」3行目でライブラリを読み込む
  * 4行目。のフォームのクラスに「h-adr」を指定
  * 94行目。class属性に “p-country-name” をセットした非表示要素を配置
  * 102行目。郵便番号入力フォームのclass属性に “p-postal-code” をセット
  * 123行目。住所入力フォームのclass属性に “p-region”（都道府県）、”p-locality”(市区町村)、”p-street-address”(町域)、”p-extended-address”(それ以降の住所) をセット

### ご意見は入力文字数が120文字以内になるように制限

inputのmaxlength属性を120に指定。

### 修正するリンクを押すとお問い合わせページに戻る。その際入力データを保持する

session()を使用。

内容確認ページ「confirmation.php」に遷移した際、セッションに値を保存。

「ContactForm.php」にて、セッションの値をマウント。

## その他

### Contact.php

* showGender()
  * 管理システムのビュー「management.blad.php」116行目で呼ばれる
  * 1、２で保存されている性別情報を「男性」「女性」に変換して出力する

* getGender()
  * 管理システムの検索時のコントローラー「ContactController.php」内のsearch()アクションで呼ばれる
  * 管理システムのラジオボタンにて
    * 「全て」をチェックすると0が渡され、配列[1, 2]が返される
    * 「男性」をチェックすると1が渡され、配列[ 1 ]が返される
    * 「女性」をチェックすると2が渡され、配列[ 2 ]が返される
  * search()アクション内84行目で返された配列を条件にデータベースを検索

  ```
  $query->whereIn('gender', Contact::getGender($request->gender) );
  ```

* getDate($from, $by)
  * 管理システムの検索時のコントローラー「ContactController.php」内のsearch()アクションで呼ばれる
  * 管理システムの日にち検索の入力「$from」「$by」が渡される
    * 「$from」～「$by」の時、「$fromの日付」と「$byの日付」を返す
    * 「$from」～「未入力」の時、「$fromの日付」と「本日の日付」を返す
    * 「未入力」～「$by」の時、「データベースの最初のデータのcreated_at」と「$byの日付」を返す
    * 「未入力」～「未入力」の時、「データベースの最初のデータのcreated_at」と「本日の日付」を返す