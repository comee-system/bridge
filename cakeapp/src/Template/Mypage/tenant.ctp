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

            <div class="mb-3 h2 col-md-4"><?=__("テナント一覧")?></div>
            <?= $this->element('myinfo') ?>
        </div>

        <div class="row">
            <?= $this->element('mymenu'); ?>
            <div class="col-md-8 order-md-10 mb-4">
                <div class="card w-100">
                    <div class="card-body">
                        <h5><?=__("テナント検索")?></h5>
                        <?= $this->Form->create(null, [
                            'url' => ['action' => '/tenant'],
                            'type' => 'post',
                            ]); ?>
                        <div class="row">
                            <div class="col-4">
                                <?= $this->Form->input("name",[
                                    "label"=>"テナント名",
                                    "class"=>"form-control",
                                    "value"=>$this->request->getData("name")
                                ]) ?>
                            </div>
                            <!--
                            <div class="col-4">
                                <label>ステータス</label>
                                <?= $this->Form->select("status", $array_status,[
                                    "class"=>"form-control",
                                    "empty"=>true
                                ]) ?>
                            </div>-->
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
                <?php foreach($tenant as $key=>$value): ?>
                    <div class="row mt-3">
                        <div class="card-deck col-md-12 text-left">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="my-0 font-weight-normal"><?= h($value->name) ?></p>
                                            <small>ID : <?= h($compnent->setId($value->id)) ?></small>
                                        </div>
                                        <div class="col-6 text-right ">
                                            <a class="btn-sm btn-warning text-white" href="/mypage/tenantedit/<?= $value[ 'id' ]?>">詳細・編集</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table-bordered w-100 text-center">
                                        <tr class="bg-secondary text-white">
                                            <th><?= __("希望地") ?></th>
                                        </tr>
                                        <tr>
                                            <td class="text-left p-1"><?= h($value['prefline']) ?>&nbsp;</td>
                                        </tr>
                                    </table>
                                    <table class="table-bordered w-100 mt-3 text-center">
                                        <tr class="bg-secondary text-white">
                                            <th><?= __("希望建物坪数") ?></th>
                                            <th><?= __("希望賃料") ?></th>
                                            <th><?= __("ステータス") ?></th>
                                            <th><?= __("登録日") ?></th>
                                        </tr>
                                        <tr>
                                            <td><?= h(number_format($value['min_floor'])) ?>坪～
                                            <?= h(number_format($value['max_floor'])) ?>坪
                                            </td>
                                            <td><?= h($value[ 'rent_money_min_jp' ]) ?>～
                                            <?= h($value[ 'rent_money_max_jp' ]) ?>
                                            </td>
                                            <td><?= h($array_open[$value[ 'open' ]]) ?></td>
                                            <td><?= h(date_format($value[ 'created' ],'Y/m/d ')) ?></td>

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


