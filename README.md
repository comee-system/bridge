# bridge
## TEST123

## 時刻の設定
### app.phpの編集
```
   'App' => [
        'namespace' => 'App',
        'encoding' => env('APP_ENCODING', 'UTF-8'),
        'defaultLocale' => env('APP_DEFAULT_LOCALE', 'ja_JP'),
        'defaultTimezone' => env('APP_DEFAULT_TIMEZONE', 'JST'),
```
```
    'Datasources' => [
        'default' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'host' => 'localhost',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            'port' => '3306',
            /*
             * It is recommended to set these options through your environment or app_local.php
             */
            'username' => 'root',
            'password' => '',
            'database' => 'bridge',
            /*
             * You do not need to set this flag to use full utf-8 encoding (internal default since CakePHP 3.6).
             */
            'encoding' => 'utf8',
            'timezone' => 'JST',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
```


## プロジェクトの作成
### intlの有効化
php.iniを開き、有効化すればインストールが可能になる。
extension=intl

### composerのインストール
```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
```

### コマンドプロンプトでの実行
```
composer create-project --prefer-dist cakephp/app:~3.8 cakeapp
```

## gitコマンド
### git clone
- git clone https://github.com/comee-system/bridge.git
- git pull origin main

## migrate の実行
### ローカル
`C:\xampp3\htdocs\bridge\bridge\cakeapp\bin>cake migrations migrate`
### サーバー
`php cake.php migrations migrate`
## bakeの実行
### ローカル
`C:\xampp3\htdocs\bridge\bridge\cakeapp\bin>cake bake All テーブル名`
### server
`php cake.php bake All テーブル名`



## sassの導入
- rubyがインストールされている必要があります
`ruby -v`
  - バージョンが指定されればinstall済み
  - 入ってなければinstall `https://rubyinstaller.org/`

### パワーシェルでinstall
`gem install sass`
- バージョンの確認
`sass -v`


- 「sass_folder」というディレクトリを作って、そのの中にbase.scssというsassファイルを用意
 ***PS C:\xampp3\htdocs\bridge\bridge\cakeapp\webroot\sass_folder***

### コンパイルコマンド
`` PS C:\xampp3\htdocs\bridge\bridge\cakeapp\webroot\sass_folder> sass base.sass:../css/base.css ``
- cssフォルダにbase.cssが作成されます

- 毎回コマンドを打つのが手間なのでwatchコマンドを利用

`` PS C:\xampp3\htdocs\bridge\bridge\cakeapp\webroot\sass_folder> sass --watch base.scss:../css/base.css ``
