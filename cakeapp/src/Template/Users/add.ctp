<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Bridge</a></li>
    <li class="breadcrumb-item"><a href="#">会員登録</a></li>
  </ol>
</nav>

<main>

  <div class="container">
    <h3>会員登録</h3>
    <section class="mb-5">
        <form class="" action="">
            <div class="form-group row">
                <div class="col-md">
                    <div class="row">
                        <div class="col-4 text-left"><?= __("氏名") ?></div>
                        <div class="col-4 text-right bg-danger text-white">必須</div>
                    </div>
                </div>
                <label for="lastname" class="col-form-label"><?= __("姓") ?></label>
                <div class="col-md">
                    <input type="lastname" class="form-control" id="lastname" placeholder="">
                </div>

                <label for="firstname" class="col-form-label"><?= __("名") ?></label>
                <div class="col-md">
                    <input type="firstname" class="form-control" id="firstname" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md">
                    <div class="row">
                        <div class="col-4 text-left"><?= __("氏名（ふりがな）") ?></div>
                        <div class="col-4 text-right bg-danger text-white">必須</div>
                    </div>
                </div>
                <label for="lastname" class="col-form-label"><?= __("せい") ?></label>
                <div class="col-md">
                    <input type="lastname_kana" class="form-control" id="lastname_kana" placeholder="">
                </div>

                <label for="firstname" class="col-form-label"><?= __("めい") ?></label>
                <div class="col-md">
                    <input type="firstname_kana" class="form-control" id="firstname_kana" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md">
                    <div class="row">
                        <div class="col-sm text-left"><?= __("企業名") ?></div>
                        <div class="col-sm text-right bg-danger text-white"><?= __("必須") ?></div>
                    </div>
                </div>
                <div class="col-sm">
                    <input type="company" class="form-control" id="company" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="postalcode" class="col-form-label"><?= __("住所") ?></label>
                </div>
                <div class="co-md-4">
                    <input type="text" class="form-control" id="postal_code1">
                </div>
                <div class="co-md-2">
                    <input type="text" class="form-control" id="postal_code1">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6 text-left">
                    <label for="pref" class="col-form-label"><?= __("都道府県") ?></label>
                    <input type="text" class="form-control" id="pref">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6 text-left">
                    <label for="city" class="col-form-label"><?= __("市区町村") ?></label>
                    <input type="text" class="form-control" id="city">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6 text-left">
                    <label for="address" class="col-form-label"><?= __("番地") ?></label>
                    <input type="text" class="form-control" id="address">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6 text-left">
                    <label for="building" class="col-form-label"><?= __("ビル・マンション名") ?></label>
                    <input type="text" class="form-control" id="buiding">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3 text-right bg-danger text-white"><?= __("必須") ?></div>
                <div class="col-6 text-left">
                    <label for="department" class="col-form-label"><?= __("担当部署") ?></label>
                    <input type="text" class="form-control" id="department">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="phone" class="col-form-label"><?= __("電話番号") ?></label>
                </div>
                <div class="col-md-3 align-items-center">
                    <div class="col-3 text-right bg-danger text-white"><?= __("必須") ?></div>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="phone1">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="phone2">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" id="phone3">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 text-right">
                    <label for="mail" class="col-form-label"><?= __("メールアドレス") ?></label>
                </div>
                <div class="col-md-3 align-items-center">
                    <div class="col-3 text-right bg-danger text-white"><?= __("必須") ?></div>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="mail">
                </div>
            </div>
            <p class="text-center">受信拒否を設定している場合、本登録用のURLが届かないため、<br >
            （info@coa-bridge.jp）からの受信ができるように設定してください。</p>
            <div class="form-group row">
                <div class="col-md-3 text-right">
                    <label for="password" class="col-form-label"><?= __("パスワード") ?></label>
                </div>
                <div class="col-md-3 align-items-center">
                    <div class="col-3 text-right bg-danger text-white"><?= __("必須") ?></div>
                </div>
                <div class="col-md-6">
                    <input type="password" class="form-control" id="password">
                </div>
            </div>
            <div class="row text-center"><p>下記の条件でパスワードを作成してください。</p></div>
            <div class="row text-center">
                <ul>
                    <li>8文字以上</li>
                    <li>半角数字を含む</li>
                    <li>半角英字を含む</li>
                </ul>
            </div>
        </form>
      <!-- <div class="d-flex flex-column flex-lg-row border border-primary rounded">
        <p class="text-center text-white bg-primary py-2 px-4 mb-0 align-self-stretch">お知らせ</p>
        <p class="py-2 px-2 px-lg-4 mb-0"><span class="d-block d-lg-inline-block mr-lg-4">2018/12/01</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, se.</p>
        <p class="pb-2 py-lg-2 px-2 px-lg-4 ml-auto mb-0"><a href="#" class="icon-link"><i class="fas fa-list-ul mr-2"></i>一覧を見る</a></p>
      </div> -->
    </section>
  </div><!-- /.container -->

</main>