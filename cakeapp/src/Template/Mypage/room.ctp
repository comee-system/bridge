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
<?= $this->element('breadcrumbs') ?>
<main>

  <section class="py-1 bg-yl-color">
    <div class="container p-3 rounded">
        <div class="row">
            <div class="mb-3 h2 col-md-4">商談ルーム</div>
            <?= $this->element('myinfo') ?>
        </div>

        <div class="row">
            <?= $this->element('mymenu'); ?>
            <div class="col-md-8 order-md-10 mb-4">


                <div class="row">
                    <div class="card-deck col-md-12 text-left">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="my-0 font-weight-normal">北千住のお店</p>
                                        <small>ID : S210311</small>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="" class="btn-sm btn-warning" >案件詳細</a>
                                    </div>
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <?php
                                $active1 = $active2 = "";
                                if($this->request->getParam('action') === "room" ) $active1 = "active";
                                if($this->request->getParam('action') === "staff" ) $active2 = "active";
                            ?>
                            <a class="nav-link <?= $active1 ?>" data-bs-toggle="tab" href="/mypage/room/1" role="tab" aria-controls="nav-home" aria-selected="true">管理者</a>
                            <!--
                            <a class="nav-link <?= $active2 ?>" data-bs-toggle="tab" href="/mypage/room/staff/1" role="tab" aria-controls="nav-profile" aria-selected="false">担当者</a>
                            -->
                        </div>
                    </nav>
                </div>
                <?php if($this->request->getParam('action') === "room" ): ?>
                    <div class="scroll_box" >

                        <div class="card mb-3 w-75">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="badge badge-warning">未読</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                    <i class="far fa-clock"></i>
                                    2021/01/01 10:00:00</div>
                                </div>
                                <p>件名：〇〇〇〇</p>
                                <div class="row">
                                    <div class="col-12">
                                        本案件へのご興味如何でしょうか？
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6 text-right">
                                        <a href="/mypage/room/message/1" class="btn-sm btn-primary" >
                                        <i class="far fa-paper-plane"></i>
                                        返信
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 w-75 float-right">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="badge badge-secondary">既読</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                    <i class="far fa-clock"></i>
                                    2021/01/01 10:00:00</div>
                                </div>
                                <p>件名：〇〇〇〇</p>
                                <div class="row">
                                    <div class="col-12">
                                        見取り図送ります。
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="" class="btn-sm btn-warning">ダウンロード</a>
                                        見取り図.pdf
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="" class="btn-sm btn-primary" >
                                        <i class="far fa-paper-plane"></i>
                                        返信
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 w-75">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="badge badge-success">下書</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                    <i class="far fa-clock"></i>
                                    2021/01/01 10:00:00</div>
                                </div>
                                <p>件名：〇〇〇〇</p>
                                <div class="row">
                                    <div class="col-12">
                                        見取り図送ります。
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="" class="btn-sm btn-warning">ダウンロード</a>
                                        見取り図.pdf
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="" class="btn-sm btn-primary" >
                                        <i class="far fa-paper-plane"></i>
                                        返信
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                <?php endif; ?>
                <?php if($this->request->getParam('action') === "staff" ): ?>
dd
                <?php endif; ?>
                <?php if($this->request->getParam('action') === "message" ): ?>
                    <?= $this->Form->create("", [
                            'type' => 'post',
                            'url' => ['controller' => 'mypage', 'action' => 'write'],
                        ]);
                        ?>
                    <div class="row">
                        <div class="col-12">
                            <textarea rows=10 class="form-control"></textarea>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="d-flex">
                            <?= $this->Html->link("戻る",
                                "/mypage/room/1",
                                [
                                    'class'=>"btn btn-secondary mr-2",
                                ]
                            ); ?>
                            <?= $this->Form->submit("一時保存",
                                [
                                    'class'=>"btn btn-warning mr-2",
                                    'value'=>'write'
                                ]
                            ); ?>
                            <?= $this->Form->submit("送信",
                                [
                                    'class'=>"btn btn-success",
                                    'value'=>'write'
                                ]
                            ); ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
  </section>

</main>


