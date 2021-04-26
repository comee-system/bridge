<?= $name ?>様　
　
下記URLより、パスワードの再設定を行ってください。

<?= D_HOME_URL ?>/login/edit?token=<?= $token ?>

URL有効期限：<?= $limit ?>

<?= D_SIGN ?>
