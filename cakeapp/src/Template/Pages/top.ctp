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
                    <p>店舗開発担当者の出展支援</p>
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
                    <a href="#" >
                        閉店見込み物件募集中!
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="main2" >
        <div class="frow mt-5 guidence">

            <div class="fright">
                <div class="guidence-area">
                    <div class="fukidashi">まずは無料会員登録から！</div>
                    <div class="mt-2 freeregist w100">
                        <div class="mt-0 sqare">
                            <a href="/users/add"  >
                                無料会員登録はこちら
                            </a>
                        </div>
                    </div>
                    <div class="mt-4 freeregist w100">
                        <a href="/users/add" class="mail" >
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

