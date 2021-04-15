# bridge
## TEST123

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
`C:\xampp3\htdocs\bridge\bridge\cakeapp\bin>cake migrations migrate`
