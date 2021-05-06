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
        <?= $this->Form->hidden('id',[
            'value'=>$id
        ])?>
        <div class="row">
            <?= $this->element('mymenu'); ?>
            <div class="col-md-8 order-md-10 mb-4">
                <div class="row">
                    <div class="card-deck col-md-12 text-left">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="my-0 font-weight-normal"><?= h($builds->name) ?></p>
                                        <small>ID : <?= h($compnent->setId($builds->id)) ?></small>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="/mypage/buildregist/<?=$builds->id?>" class="btn-sm btn-warning text-white" >案件詳細</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <dl class="row">
                                    <dt class="col-2">ステータス</dt>
                                    <dd class="col-10"><?= h($array_build_status[$builds->status]) ?></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-2">案件登録日</dt>
                                    <dd class="col-4"><?= h(date("Y/m/d",strtotime($builds->created))) ?></dd>
                                    <dt class="col-2">募集開始日</dt>
                                    <dd class="col-4">
                                    <?php if(isset($builds->start) && $builds->start): ?>
                                            <?= h(date("Y/m/d",strtotime($builds->start))) ?>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </dd>
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
                    <div class="scroll_box" id="messagearea" >
                    </div>

                    <?= $this->Form->create(null, [
                        'url' => ['action' => '/room/'.$id],
                        'type' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]); ?>
                    <div class="card mb-3 mt-3" id="message">
                        <div class="card-body">
                            <div class="row ">
                                <?= $this->Form->textarea("comment",[
                                    "type"=>"textarea",
                                    "class"=>"form-control",
                                    "label"=>false,
                                    "template"=>false,
                                    "placeholder"=>"コメントを入力してください。"
                                ]) ?>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="row">
                                <div class="col-6">
                                    <?= $this->Form->input ("upload",[
                                        "type" => "file",
                                        "label"=>false
                                    ])?>
                                </div>
                                <div class="col-6 text-right">
                                    <?= $this -> Form -> button ( "<i class='far fa-paper-plane'></i> 送信",[
                                        "class"=>"btn btn-primary",
                                        "escape"=>false
                                    ]); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
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

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div id="modal_body"></div>
      </div>
      <div class="modal-footer">

        <a href="" id="modal_download" class="btn btn-warning text-white"></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</main>


