<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta http-equiv="Content-Language" content="ja">
  <meta name="google" content="notranslate">
  <title>Bridge</title>
  <meta name="description" content="サイトの説明文">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="canonical" href="あなたのサイトURL">
  <link rel="icon" type="image/png" href="ファビコンのパス" />
  <!-- OGP設定 -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="あなたのサイトURL" />
  <meta property="og:image" content="SNSで表示させたい画像のパス" />
  <meta property="og:title" content="ページタイトル" />
  <meta property="og:description" content="サイトの説明文" />
  <!-- Facebook用設定 -->
  <meta property="fb:app_id" content="facebookのApp ID" />
  <meta property="article:publisher" content="FacebookページのURL">
  <!-- Twitter用設定 -->
  <meta name="twitter:card" content="Twitterカードの種類">
  <meta name="twitter:site" content="@ユーザー名">
  <!-- スタイルシートはここから -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/top.css">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/step.css">
  <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<body id="page-top">

  <header>

    <nav  class="d-flex w-100 align-items-center">
        <div class="w-25">
            <div class="d-flex ml-3" id="topicon">
                <div>
                    <a class="navbar-brand mr-auto" href="/">
                        <img src="/img/top/logo.svg" alt="bridge" class="logo">
                    </a>
                </div>
                <div class="ml-4 mt-3 mt-sp-1">
                    店舗開発担当者限定<br />
                    店舗再生プラットフォーム
                </div>
            </div>
        </div>
        <div class="w-75 sp-wauto" >
            <div class="sp-menu-icon">
                <a href="#" >
                    <i class="fas fa-bars" id="micon"></i>
                </a>
            </div>
            <ul class="menu-style">
                <li><a href="#bridge"><b>ブリッジとは？</b></a></li>
                <li><a href=""><b>3つのポイント</b></a></li>
                <li><a href=""><b>マッチングの流れ</b></a></li>
                <li><a href=""><b>ご相談・お問い合わせ</b></a></li>
                <li>
                <?php if ($logindata) : ?>
                    <?= $this->Html->link(
                        'マイページ',
                        '/mypage/',
                        [
                        'class' => '',
                        'escape' => false
                        ]
                    ) ?>
                <?php else : ?>
                    <?= $this->Html->link(
                        '無料会員登録',
                        '/users/add',
                        [
                        'class' => '',
                        'escape' => false
                        ]
                    ) ?>
                <?php endif; ?>
                </li>
                <li>
                <?php if ($logindata) : ?>
                    <?= $this->Html->link(
                        'ログアウト',
                        '/users/logout',
                        [
                        'class' => '',
                        ]
                    ) ?>
                <?php else : ?>
                    <?= $this->Html->link(
                        'ログイン',
                        '/login',
                        [
                        'class' => '',
                        'escape' => false
                        ]
                    ) ?>
                <?php endif; ?>
                </li>
            </ul>
        </div>

    </nav><!-- /# nav01 -->

  </header>

  <?= $this->fetch('content') ?>


<div class="toplink">
    <a href="#"><img src="/img/top/top.svg" /></a>
</div>
  <footer id="footer" class="bg-light pc">
    <div class="container py-4 py-md-5">


      <div id="footer-index" class="row pt-4">
        <ul class="col list-unstyled">
          <li>Bridgeについて</li>
          <li>
            <ul class="list-unstyled">
              <li><a href="http://www.area-design.co.jp/" target=_blank><?= __("運営会社情報") ?></a></li>
              <li><a href="/pdf/termofuse.pdf" target=_blank><?= __("利用規約") ?></a></li>
            </ul>
          </li>
        </ul>
        <ul class="col list-unstyled">
          <li>&nbsp;</li>
          <li>
            <ul class="list-unstyled">
              <li><a href="/questions/">お問い合わせ</a></li>
              <?php if ($logindata) : ?>
                <li><a href="/users/logout">ログアウト</a></li>
              <?php else: ?>
                <li><a href="/users/add/">無料会員登録</a></li>
                <li><a href="/login">ログイン</a></li>
                <?php endif; ?>
            </ul>
          </li>
        </ul>

      </div><!-- /.footer-index -->



        <div class="container py-4 py-md-5">

          <div id="footer-logo" class="mt-2 mt-sm-4">
            <div class="text-center  align-items-sm-center ">
              <a class="mr-4" href="/"><img src="/img/bridge.gif" alt="Bridge" height="50"></a>
            </div>
          </div><!-- .row -->
        </div><!-- .container -->
      </footer>

        <div class="text-white bg-primary pc">
            <p class="text-center mb-0 py-2"><small>Copyright (C) bridge. All Rights Reserved.</small></p>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


        <?= $this->Html->script('/js/jquery.min.js') ?>
        <?= $this->Html->script('/js/jquery-ui.min.js') ?>
        <?= $this->Html->script('/js/jquery.ui.datepicker-ja.min.js') ?>
        <script src="/js/base.js"></script>
        <script src="/js/comment.js"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
      <!----------------------------------------------->
</body>

</html>
