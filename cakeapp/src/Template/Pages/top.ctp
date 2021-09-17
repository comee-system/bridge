<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


/*
if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;
*/
$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

    <div class="main_imgBox">
        <div class="mainText" >
            <div class="mainText-h2">
                <div>
                    <p>店舗開発担当者の出店支援</p>
                    <p>店舗開発担当者と<br />秘匿性が高い閉店見込物件をつなげる<br />店舗再生プラットフォーム</p>
                    <p>
                        ※ハンズオン型ソリューションマッチングサイト<br />
                        (ブリッジ公認エージェントがマッチングから成約までコーディネート)
                    </p>
                    <p>
                        本システムは令和3年5月度に東京都の経営革新計画に承認されました
                    </p>
                </div>
            </div>
            <div class="mt-2 freeregist">
                <div>
                    <a href="/users/add" >
                        無料会員登録はこちら
                    </a>
                </div>
            </div>
        </div>

        <div class="main_img" style="background-image: url(/img/top/kv1.png)"></div>
        <div class="main_img" style="background-image: url(/img/top/kv2.png)"></div>
        <div class="main_img" style="background-image: url(/img/top/kv3.png)"></div>
        <div class="main_img" style="background-image: url(/img/top/kv1.png)"></div>
        <div class="main_img" style="background-image: url(/img/top/kv2.png)"></div>
        <div class="main_img" style="background-image: url(/img/top/kv3.png)"></div>
    </div>
    <div class="container" id="main">
        <div class="about"><img src="/img/top/about.png" /></div>
        <div class="text-center mt-5" id="bridge">
            <h3>「<ruby>Bridge<rt>ブリッジ</rt></ruby>」とは？</h3>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 col-12 "><img src="/img/top/about_bridge.png" class="w-100" /></div>
            <div class="col-md-6 col-12 ">
                <div class="mt-3 note">
                    大手から中小企業まで店舗開発のサポートをしてきた
                    ノウハウを生かし、希少性・秘匿性が高い閉店見込み物件をデータベース化しました。<br />
                    「ブリッジ」は、その豊富な情報からスピーディーに優良物件へのリーチを可能にした店舗開発担当限定の
                    <strong  class="marker" >テナントダイレクトマッチングシステム</strong >です。<br />
                    ブリッジが公認した「エージェント」がハンズオン型で「閉店」と「出店」を繋ぐことで、店舗再生を創造することを目指しています。
                </div>
                <div class="mt-5 recrult">
                    <a href="#main6" >
                        閉店見込み物件募集中!
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="main2" >
        <div class=" frow mt-5 guidence ">
            <div class="container">
                <div class="fright ">
                    <div class="guidence-area mt-4">
                        <div class="fukidashi">まずは無料会員登録から！</div>
                        <div class="mt-2 freeregist ">
                            <div class="mt-0 sqare">
                                <a href="/users/add"  >
                                    無料会員登録はこちら
                                </a>
                            </div>
                        </div>
                        <div class="mt-4 freeregist ">
                            <a href="#questionarea" class="mail" >
                                ご相談お問い合わせ
                            </a>
                        </div>
                    </div>
                </div>


                <div class="fleft text-center">
                    <div class="guidence-image-area">
                        <img src="/img/top/guidance.png" class="w-100 mt-5 pc" />
                        <img src="/img/top/guidance_sp.png" class="w-100 mt-5  sp" />
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container" id="main3">
        <div class="point"><img src="/img/top/point.png" /></div>
        <div class="text-center mt-5" id="threepoint">
            <h3>「<ruby>Bridge<rt>ブリッジ</rt></ruby>」の３つのポイント</h3>
        </div>

        <div class="mx-auto w-90 mt-5" >
            <div class="clearfix">
                <div class="float-md-right float-none  w-50 mt-5 w-md-100">
                    <div class="point1  align-items-center">
                        <div>
                        <h4>POINT1</h4>
                        <h5>希少性・秘匿性が高い閉店見込物件をデータベース化</h5>
                        </div>
                    </div>
                </div>
                <div class="float-md-left float-none w-50 mt-5 w-md-100">
                    <img src="/img/top/point1.png" class="w-95" />
                </div>


                <div class="float-md-right mt-5 main3-text w-50 w-md-100">
                    <b>
                        希少性・秘匿性が高い閉店見込物件は、借主（テナント）主導で、水面下で流通が進むため、コネクションなどが無いとなかなか出会うことができません。ニーズも高くタイミングも重要になります。ブリッジではそんな閉店見込物件を中心にデータベース化し、情報を提供しています。
                    </b>

                    <div class="mt-3 p-4 main3-text main3-detail text-white align-items-center">
                        <p>
                        ブリッジの会員になると、<strong  class="markerOrenge" >閉店見込物件の登録</strong>も可能になります。登録した物件と出店希望企業がマッチングし、成約になると、物件を登録した側にも<strong  class="markerOrenge" >メリット</strong>があります。
                        </p>
                        <div class="main3-link" >
                            <a href="#main6">詳しくはこちら<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="main4">
        <div class="mx-auto w-90 mt-5" >
            <div class="clearfix">
                <div class="float-md-left float-none  w-50 mt-5 w-md-100">
                    <div class="point2  align-items-center">
                        <div>
                            <h4>POINT2</h4>
                            <h5>店舗開発担当者（出店希望企業）と閉店見込物件のアプローチが最短化</h5>
                        </div>
                    </div>
                </div>
                <div class="float-md-right float-none w-50 mt-5 w-md-100">
                    <img src="/img/top/point2.png" class="w-95" />
                </div>

                <div class="float-md-right mt-5 main3-text w-50 w-md-100">
                    <p>
                        今までアナログで行っていた作業が自動化されることで、店舗開発担当者と閉店見込物件のアプローチが最短化され、契約・出店までがスピーディーに。
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="container" id="main8">

        <div class="mx-auto w-90 mt-5" >
            <div class="clearfix">
                <div class="float-md-right float-none  w-50 mt-5 w-md-100">
                    <div class="point3  align-items-center">
                        <div>
                        <h4>POINT3</h4>
                        <h5>10年間で200店舗以上の店舗開発サポート実績とノウハウを活かした店舗再生プラットフォーム</h5>
                        </div>
                    </div>
                </div>
                <div class="float-md-left float-none w-50 mt-5 w-md-100">
                    <img src="/img/top/point3.png" class="w-95" />
                </div>


                <div class="float-md-right mt-5 main3-text w-50 w-md-100">
                    <b>
                    大手から中小企業まで、10年間で200店舗以上の店舗開発サポートを行ってきた弊社「株式会社エリアデザイン」のノウハウを活かし、マッチングのためのプラットフォームを構築しました。
                    <br />
                    Bridge(ブリッジ）が保有する希少性・秘匿性の高いデータとマーケティング力で店舗開発者と最適な店舗物件をマッチングすることができます。
                    </b>

                    <div class="mt-5 p-4 main3-text main8-detail  align-items-center">
                        <p>
                        本システムは令和３年５月度に<br />
                        <span>東京都の経営革新計画</span>に承認されました
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-5 aquaback" >
        <div class="container" id="main5">
            <div class="flow"><img src="/img/top/flow.png" /></div>
            <div class="mt-5">
                <div class="text-center" id="flow">
                    <h3 >マッチングの流れ</h3>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3 text-center">
                        <img src="/img/top/step1.png" class="w-75 w-md-80" />
                    </div>
                    <div class="col-md-6">
                        <div class="flow-step">
                            <h6>STEP1</h6>
                            <h4>まずは無料会員登録！</h4>
                            <p>
                                ご登録いただいた内容を確認し、審査いたします。
                            </p>

                            <div class="mt-5 freeregist ">
                                <div class="mt-0">
                                    <a href="/users/add"  >
                                        無料会員登録はこちら
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="balloon"></div>

                <div class="row mt-5">
                    <div class="col-md-3 text-center">
                        <img src="/img/top/step2.png" class="w-75 w-md-80" />
                    </div>
                    <div class="col-md-6">
                        <div class="flow-step">
                            <h6>STEP2</h6>
                            <h4>出店予定テナントの希望条件登録</h4>
                            <h5>(閉店見込物件の登録も可能！)</h5>
                        </div>

                    </div>
                </div>
                <div class="balloon"></div>

                <div class="row mt-5">
                    <div class="col-md-3 text-center">
                        <img src="/img/top/step3.png" class="w-75 w-md-80" />
                    </div>
                    <div class="col-md-6">
                        <div class="flow-step">
                            <h6>STEP3</h6>
                            <h4>閉店見込み物件と企業</h4>
                            <h5>(店舗開発担当者)のマッチング</h5>
                            <p>閉店見込み物件をご紹介いたします。</p>
                        </div>

                    </div>
                </div>
                <div class="balloon"></div>
                <div class="row mt-5">
                    <div class="col-md-3 text-center">
                        <img src="/img/top/step4.png" class="w-75 w-md-80" />
                    </div>
                    <div class="col-md-6">
                        <div class="flow-step">
                            <h6>STEP4</h6>
                            <h4>物件のご成約</h4>
                            <p>マッチングからご成約までをサポートいたします。</p>
                            <p>※ご成約時には、企画料が発生します。</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <div id="main6">
        <div class="main6-area">
            <div class="container">
                <div class="main6-title">
                    <p>閉店予定の物件がある店舗開発担当者様も必見！</p>
                </div>
                <h2>
                閉店見込物件募集中！<br class="sp" />まずは無料会員登録！
                </h2>
                <div class="row">
                    <div class="col-4 col-md-2">
                        <img src="/img/top/secret.png"  class="w-100 secret" />
                    </div>
                    <div class="col-8 mt-5 col-md-10">
                        <p>
                        ブリッジの会員様は、<strong class="markerOrenge"> 閉店見込物件の登録</strong>も可能です。マッチングの前に事前に
                        <strong class="markerOrenge">「秘密保持」</strong>を含む業務依頼書を締結するため、情報が公になることはありません。
                        </p>
                    </div>
                </div>

                <div class="mt-5 main6-merit">
                    <div class="main6-merit-title">物件を登録すると<br class="sp" />こんなメリットがあります。</div>
                    <div class="main6-merit-area">
                        <div class="clearfix mt-5">
                            <div class="float-left merit-box">merit1</div>
                            <div class="float-left">
                                閉店コストの削減につながる可能があります。
                            </div>
                            <div class="float-left">
                            ※登録した物件と出店希望企業がマッチングし、成約になった場合
                            </div>
                        </div>
                        <div class="clearfix mt-5">
                            <div class="float-left merit-box">merit2</div>
                            <div class="float-left">
                            閉店におけるトータルサポートサービスをご提供いたします。
                            </div>
                            <div class="float-left">
                            （契約書内容の精査や顧問弁護士・工事業者との連携など）
                            </div>
                        </div>
                        <div class="clearfix mt-5">
                            <div class="float-left merit-box">merit3</div>
                            <div class="float-left">
                                閉店の煩雑な業務を軽減いたします。
                            </div>
                            <div class="float-left">
                                マッチングから成約までの当事者間の調整サポートを行います。
                            </div>
                        </div>
                        <div class="merit-bonus mt-5">
                            <div>
                                <h5>他にも嬉しい<br />ボーナスメリットが！</h5>
                            </div>
                            <div>
                                登録した物件がマッチングし、成約した場合には
                                <u>物件紹介手数料</u>をお支払いいたします。
                            </div>
                        </div>
                    </div>

                </div>
                <div class="merit-question" >
                    <div class="row mt-5">
                        <div class="col-12 col-md-6">
                            <div class="slash">
                                <p>
                                    「まずは相談だけしたい」という方も大歓迎!<br />
                                    お気軽にお問い合わせください。
                                </p>
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="freeregist ">
                                <a href="#questionarea" class="mail" >
                                    　ご相談お問い合わせ
                                </a>
                        </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="freeregist ">
                                <div class="mt-2 sqare">
                                    <a href="/users/add"  >
                                        　無料会員登録はこちら
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="main7">
        <div class="point"><img src="/img/top/contact.png" /></div>
        <div class="text-center " id="questionarea">
            <h3>ご相談・お問い合わせ</h3>
        </div>


        <section class="">
            <div class="card noboarder">
                <div class="card-body">
                    <div class="col-md-12 mx-auto">
                        <?= $this->Flash->render() ?>

                        <?= $this->Form->create("", [
                            'type' => 'post',
                            'url' => ['controller' => 'Questions', 'action' => 'conf'],
                        ]);?>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= __("会社名") ?></label>
                                    <?php
                                        $param = [
                                            "type"=>"text",
                                            "label"=>false,
                                            "class"=>"form-control",
                                        ];
                                        if(!empty($campany)) $param['value'] = $campany;
                                    ?>
                                    <?= $this->Form->control("campany",$param);?>
                                    <small class="text-primary"><?= __("※個人の方は入力不要です") ?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label><?= __("部署") ?></label>
                                    <?php
                                        $param = [
                                            "type"=>"text",
                                            "label"=>false,
                                            "class"=>"form-control",
                                        ];
                                        if(!empty($busyo)) $param['value'] = $busyo;
                                    ?>
                                    <?= $this->Form->control("busyo",$param);?>
                                    <small class="text-primary"><?= __("※個人の方は入力不要です") ?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <label><?= __("姓") ?></label>
                                <span class="badge badge-danger"><?= __("必須") ?></span>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($sei)) $param['value'] = $sei;
                                ?>
                                <?= $this->Form->control("sei",$param);?>
                                </div>
                                <div class="col-md-5">
                                <label><?= __("名") ?></label>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($mei)) $param['value'] = $mei;
                                ?>
                                <?= $this->Form->control("mei",$param);?>
                                </div>
                                <div class="col-md-12">
                                    <?php if(!empty($question->getErrors()[ 'sei' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'sei' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($question->getErrors()[ 'mei' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'mei' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                <label><?= __("姓(かな)") ?></label>
                                <span class="badge badge-danger"><?= __("必須") ?></span>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($sei_kana)) $param['value'] = $sei_kana;
                                ?>
                                <?= $this->Form->control("sei_kana",$param);?>
                                </div>
                                <div class="col-md-5">
                                <label>名(かな)</label>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($mei_kana)) $param['value'] = $mei_kana;
                                ?>
                                <?= $this->Form->control("mei_kana",$param);?>
                                </div>
                                <div class="col-md-12">
                                    <?php if(!empty($question->getErrors()[ 'sei_kana' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'sei_kana' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                    <?php if(!empty($question->getErrors()[ 'mei_kana' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'mei_kana' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row mt-2">
                                <div class="col-md-12">
                                <label><?= __("メールアドレス") ?></label>
                                <span class="badge badge-danger"><?= __("必須") ?></span>

                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($mail)) $param['value'] = $mail;
                                ?>
                                <?= $this->Form->control("mail",$param);?>

                                </div>
                                <div class="col-md-12">
                                    <?php if(!empty($question->getErrors()[ 'mail' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'mail' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                <label><?= __("電話番号") ?></label>
                                <span class="badge badge-danger"><?= __("必須") ?></span>

                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($tel)) $param['value'] = $tel;
                                ?>
                                <?= $this->Form->control("tel",$param);?>

                                </div>
                                <div class="col-md-12">
                                    <?php if(!empty($question->getErrors()[ 'tel' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'tel' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                <label><?= __("郵便番号") ?></label>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                        "onKeyUp"=>"AjaxZip3.zip2addr(this,'','pref','address');"
                                    ];
                                    if(!empty($zip)) $param['value'] = $zip;
                                ?>
                                <?= $this->Form->control("zip",$param);?>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                <label><?= __("都道府県") ?></label>
                                <?php
                                    $param = [
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($pref)) $param['value'] = $pref;
                                ?>
                                <?= $this->Form->select("pref",$array_prefecture,$param);?>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                <label><?= __("市区町村・番地") ?></label>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($address)) $param['value'] = $address;
                                ?>
                                <?= $this->Form->control("address",$param);?>
                                </div>
                            </div>



                            <div class="row mt-2">
                                <div class="col-md-12">
                                <label>問合せ内容</label>
                                <span class="badge badge-danger"><?= __("必須") ?></span>

                                <?php
                                    $param = [
                                        "type"=>"textarea",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($note)) $param['value'] = $note;
                                ?>
                                <?= $this->Form->control("note",$param);?>

                                </div>
                                <div class="col-md-12">
                                    <?php if(!empty($question->getErrors()[ 'note' ][ '_empty' ])): ?>
                                    <span class="text-danger"><?= $question->getErrors()[ 'note' ][ '_empty' ] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="mt-5 conforange">
                                <div>
                                    <?= $this->Form->submit("内容を確認する",
                                    [
                                        'name'=>"conf",
                                        'class'=>"confbtn btn-orange "
                                    ])?>
                                </div>
                            </div>



                        <?= $this->Form->end()?>
                    </div>
                </div>
            </div>
        </section>
    </div>

