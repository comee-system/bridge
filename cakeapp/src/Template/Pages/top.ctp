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

<main>
    <!----------------------------------------------->
    <div class="container">
        <div class="position-relative">
            <div class="toptext mt-md-3">
            </div>

            <img src="./img/top1.png" class="w-100" />
            <div class="topTextArea position-absolute">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <h4 class=" bg-danger text-white text-center">店舗開発者限定</h4>
                    </div>
                    <div class="col-md-4 mt-2 col-12">
                        <a href="/users/add" class="btn-lg btn-warning text-white w-100">まずは無料登録</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 col-8 mx-auto">
                        <img src="./img/openclose.png" class="w-100 " />
                    </div>
                </div>
            </div>
        </div>

        <!----------------------------------------------->
        <section class="mb-5 mt-5">
        <div class="row">
            <div class="col-6 text-center">
                <a href="/user/add" class="btn btn-warning text-white w-100">まずは無料登録</a>
            </div>
            <div class="col-6 text-center">
                <a href="/questions" class="btn btn-warning text-white w-100">お問い合わせ</a>
            </div>
        </div>
        </section>
        <!----------------------------------------------->
        <section class="py-5 bg-yl-color">
            <div class="container p-3 rounded">
            <img src="./img/bridgeinfo.png" class="w-100" />
            </div>
        </section>
        <!----------------------------------------------->
        <section class="mb-5 mt-5">
            <div class="row">
                <div class="col-6 text-center">
                    <a href="/user/add" class="btn btn-warning text-white w-100">まずは無料登録</a>
                </div>
                <div class="col-6 text-center">
                    <a href="/questions" class="btn btn-warning text-white w-100">お問い合わせ</a>
                </div>
            </div>
        </section>

        <section class="py-5 bg-yl-color">
            <div class="container p-3 rounded">
            <img src="./img/user.png" class="w-100" />
            </div>
        </section>


        <section class="mb-5 mt-5">
            <div class="row">
                <div class="col-6 text-center mx-auto">
                    <a href="/user/add" class="btn btn-warning text-white w-100">まずは無料登録</a>
                </div>
            </div>
        </section>


    </div><!-- /.container -->

</main>


