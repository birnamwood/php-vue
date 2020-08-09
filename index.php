<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.3.8/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
<?php require 'db.php' ?>
<div id="app">
<v-app>
<v-main>

  <v-app-bar dark>
    <v-app-bar-nav-icon />
    <v-toolbar-title>TOPページ</v-toolbar-title>
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
  <v-card dark class="center80">
    <v-card-title class="headline">メニュー</v-card-title>
    <v-card-subtitle>php vue heroku postgres</v-card-subtitle>
    <v-divider class="mx-3"></v-divider>
    <v-card-text>
      <div class="body-1 mb-1">
        データベース接続先：
        <?php var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION)); ?>
      </div>
      <div class="body-2 mb-2">
        <a href="/userCreate.php">ユーザー登録</a>
      </div>
    </v-card-text>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn small>OK</v-btn>
      <v-btn x-small>Cancel</v-btn>
    </v-card-actions>
  </v-card>

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

<css>
  .center80 {
    width: 80%;
    margin: auto;
  }