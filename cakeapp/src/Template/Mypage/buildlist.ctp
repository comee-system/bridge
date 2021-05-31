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

            <div class="mb-3 h2 col-md-4">物件一覧</div>
            <?= $this->element('myinfo') ?>
        </div>

        <div class="row">
            <?= $this->element('mymenu'); ?>
            <div class="col-md-8 order-md-10 mb-4">
            <?= $this->Flash->render() ?>
                <div class="card w-100">
                    <div class="card-body">
                        <h5>物件検索</h5>
                        <?= $this->Form->create(null, [
                            'url' => ['controller'=>'mypage','action' => 'buildlist'],
                            'type' => 'post',
                            ]); ?>
                        <div class="row">
                            <div class="col-4">
                                <?= $this->Form->input("name",[
                                    "label"=>"物件名",
                                    "class"=>"form-control",
                                    "value"=>""
                                ]) ?>
                            </div>
                            <div class="col-">
                                <label>ステータス</label>
                                <?php //交渉中止をけす
                                    unset($array_status[5]);
                                ?>
                                <?= $this->Form->select("status", $array_status,[
                                    "class"=>"form-control",
                                    "empty"=>"-"
                                ]) ?>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 text-right">
                            <?= $this->Form->button("検索",[
                                "type"=>"submit",
                                "name"=>"search",
                                "class"=>"btn btn-secondary w-25"
                            ])?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <nav aria-label="Page navigation example ">
                    <ul class="pagination mt-3">
                        <?= $this->Paginator->numbers(); ?>
                    </ul>
                </nav>
                <?php foreach($builds as $key=>$values): ?>
                    <div class="row mt-5">
                        <div class="card-deck col-md-12 text-left">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <?php
                                            $status = "";
                                            if($values->status == 0) $status = '<span class="badge badge-secondary">一時保存</span>';
                                            ?>
                                            <p class="my-0 font-weight-normal"><?= $status ?> <?= h($values->name) ?></p>
                                            <small>ID : <?= h($compnent->setId($values->id)) ?></small>
                                        </div>
                                        <div class="col-6 text-right ">
                                            <a class="btn-sm btn-warning text-white" href="/mypage/buildregist/<?= $values->id ?>">詳細・編集</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $bg = "";
                                    if($values->status == 0 ) $bg = "bg-secondary";
                                ?>
                                <div class="card-body <?=$bg?> ">
                                    <table class="table-bordered w-100 text-center">
                                        <tr class="bg-secondary text-white">
                                            <th><?= __("所在地") ?></th>
                                            <th><?= __("店舗面積") ?></th>
                                            <th><?= __("ステータス") ?></th>
                                            <th><?= __("物件登録日") ?></th>
                                            <th><?= __("募集開始日") ?></th>
                                        </tr>
                                        <tr>
                                            <?php
                                            $pref = (isset($array_prefecture[$values->pref]))?$array_prefecture[$values->pref]:"";
                                            ?>
                                            <td><?= h($pref) ?></td>
                                            <td><?= h(number_format($values->shop_area)) ?>坪</td>
                                            <td><?= h($array_status[$values->status]) ?></td>
                                            <td><?= date("Y/m/d",strtotime($values->created) )?></td>
                                            <td>
                                                <?php if(!$values->start): ?>
                                                未設定
                                                <?php else: ?>
                                                <?= date("Y/m/d",strtotime($values->start) )?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
  </section>

</main>


