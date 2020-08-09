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

  <v-app dark>
  <v-app-bar dark>
    <v-app-bar-nav-icon />
    <v-toolbar-title>TOPページ</v-toolbar-title>
    <v-spacer />
    <v-btn icon>
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
    <router-view />
  </v-content>
</v-app>

  <v-card dark>
  <v-card-title class="headline">データベース接続先</v-card-title>
  <v-card-subtitle>heroku postgres</v-card-subtitle>
  <v-divider class="mx-3"></v-divider>
  <v-card-text>
    <div class="body-1 mb-1">
      <?php
        $url = parse_url(getenv('DATABASE_URL'));
        $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
        $pdo = new PDO($dsn, $url['user'], $url['pass']);
        var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));
      ?>
    </div>
  </v-card-text>
  <v-card-actions>
    <v-spacer></v-spacer>
    <v-btn small>OK</v-btn>
    <v-btn x-small>Cancel</v-btn>
  </v-card-actions>
</v-card>

  <a href="/vue-top.php">Vueテスト</a>
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