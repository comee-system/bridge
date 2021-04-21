<!DOCTYPE html>
<html>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="UTF-8">
<title>ページ名 | サイト名</title>
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
<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
</head>

<body id="page-top">

<header>

  <nav id="nav01">
    <div class="container navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand mr-auto" href="index.html">
          <img src="/img/bridge.gif" alt="サイト名" class="logo">
        </a>
      <ul class="nav mr-3 align-self-lg-end justify-content-lg-end d-none d-lg-flex">
        <li class="nav-item"><a href="#" class="nav-link p-2"><i class="fa fa-chevron-right mr-1 small"></i>LINK01</a></li>
        <li class="nav-item"><a href="#" class="nav-link p-2"><i class="fa fa-chevron-right mr-1 small"></i>LINK02</a></li>
      </ul>

      <a href="users/add" class="btn btn-warning mr-1  d-lg-inline-block text-white">会員登録<br />はこちら</a>
      <a href="contact/index.html" class="btn btn-primary  d-lg-inline-block">ログイン<br>はこちら</a>

    </div>
  </nav><!-- /# nav01 -->


</header>



<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>



<footer id="footer" class="bg-light ">
  <div class="container py-4 py-md-5">


    <div id="footer-index" class="row pt-4">
      <ul class="col list-unstyled">
        <li>Bridgeについて</li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">運営会社情報</a></li>
            <li><a href="#">利用規約</a></li>
            <li><a href="#">個人情報保護方針</a></li>
            <li><a href="#">機密保持契約</a></li>
          </ul>
        </li>
      </ul>
      <ul class="col list-unstyled">
        <li>&nbsp;</li>
        <li>
          <ul class="list-unstyled">
            <li><a href="#">お問い合わせ</a></li>
            <li><a href="#">無料会員登録</a></li>
            <li><a href="#">ログイン</a></li>
          </ul>
        </li>
      </ul>



    </div><!-- /.footer-index -->

    <div id="footer-logo" class="mt-2 mt-sm-4">
      <div class="text-center d-sm-flex align-items-sm-center">
        <a class="mr-4" href="../index.html"><img src="../img/bridge.gif" alt="サイト名" height="50"></a>
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
      </div>
    </div><!-- .row -->
  </div><!-- .container -->
</footer>

<div class="text-white bg-primary">
  <p class="text-center mb-0 py-2"><small>Copyright (C) サイト名. All Rights Reserved.</small></p>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/js/base.js" ></script>
<!----------------------------------------------->
</body>

</html>
