<?php
  require 'db.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      echo '入力された値が不正です。';
      return false;
    }

    //パスワードの正規表現
    if (preg_match('/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}$/i', $_POST['password'])) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
      echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
      return false;
    }
    //登録処理
    try {
      $stmt = $pdo->prepare('insert into users(email, password) values(?, ?)');
      $stmt->execute([$email, $password]);
      echo '登録完了';
    } catch (\Exception $e) {
      echo '登録済みのメールアドレスです。';
    }
}

?>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.3.8/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
<div id="app">
<v-app>
<v-main>

  <v-app-bar dark>
    <v-app-bar-nav-icon />
    <v-toolbar-title>ユーザー登録</v-toolbar-title>
    <v-spacer />
    <v-btn href="/" icon>
      <v-icon>mdi-home</v-icon>
    </v-btn>
    <v-btn icon>
      <v-icon>mdi-magnify</v-icon>
    </v-btn>
    <v-btn icon>
      <v-icon>mdi-account</v-icon>
    </v-btn>
    <v-btn icon>
      <v-icon>mdi-dots-vertical</v-icon>
    </v-btn>
  </v-app-bar>
  <v-content>
  <br>
  <a href="/">TOPページ</a>
  <h2>ユーザー登録</h2>

  <form method="post">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
    <v-btn small dark type="submit">登録</v-btn>
  </form>

  </v-content>
</v-main>
</v-app>
</div>


  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.3.8/dist/vuetify.js"></script>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
    })
  </script>
</body>
