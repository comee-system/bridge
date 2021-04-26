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

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<main>

  <section class="py-1 bg-yl-color">
    <div class="container p-3 rounded">
        <div class="row">
            <div class="mb-3 h2 col-md-4">商談ルーム一覧</div>
            <div class="mb-3 col-md-8 text-right">
                <a href="#">
                <i class="fas fa-home"></i> 新規商談ルーム
                </a>
                <span class="badge badge-pill bg-danger align-text-bottom text-white">27件</span>

                <a class="ml-3" href="#">
                <i class="fas fa-mail-bulk"></i> 新着メッセージ
                </a>
                <span class="badge badge-pill bg-success align-text-bottom text-white">27件</span>
            </div>
        </div>

        <div class="row">
            <?= $this->element('mymenu'); ?>
            <div class="col-md-8 order-md-10 mb-4">


                <div class="row">
                    <div class="card-deck col-md-12 text-left">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <p class="my-0 font-weight-normal">北千住のお店</p>
                                <small>ID : S210311</small>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-2">ステータス</dt>
                                    <dd class="col-10">マッチング中</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-2">案件登録日</dt>
                                    <dd class="col-4">2021/03/01</dd>
                                    <dt class="col-2">募集開始日</dt>
                                    <dd class="col-4">2021/03/01</dd>
                                </dl>
                                <button type="button" class="btn btn-sm btn-block btn-outline-primary">商談ルーム</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
  </section>

</main>


