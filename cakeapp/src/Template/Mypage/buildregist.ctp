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

            <div class="mb-3 h2 col-md-4"><?= __("物件登録") ?></div>
            <?= $this->element('myinfo') ?>
        </div>

        <div class="row">
            <?= $this->element('mymenu'); ?>
            <div class="col-md-8 order-md-10 mb-4">

                <?= $this->element("mystep") ?>

                <div class="row mt-5">
                    <div class="card-deck col-md-12 text-left">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <p class="my-0 font-weight-normal"><?= __("注意事項") ?></p>
                            </div>
                            <div class="card-body">
                                <?= $this->Form->create(null, [
                                    'url' => ['action' => '/mypage/buildregist'],
                                    'type' => 'post',
                                ]); ?>
                                <div class="row">
                                    <div class="col-2"><?= __("物件名称") ?></div>
                                    <div class="col-2">
                                    <span class="badge badge-danger"><?= __("必須") ?></span>
                                    </div>
                                    <div class="col-8">
                                        <?= $this->Form->input("name",[
                                            "type"=>"text",
                                            "class"=>"form-control",
                                            "label"=>false,
                                            "placeholder"=>__("物件名を入力してください。")
                                        ]) ?>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2"><?= __("所在地") ?></div>
                                    <div class="col-2">
                                        <span class="badge badge-danger"><?= __("必須") ?></span>
                                    </div>
                                    <div class="col-8 ">
                                        <div class="d-flex">
                                            <div class="text-nowrap">郵便番号</div>
                                            <div class="w-25 ml-2">
                                                <?= $this->Form->input("post1",[
                                                    "type"=>"text",
                                                    "class"=>"form-control ",
                                                    "label"=>false,
                                                    "maxlength"=>3
                                                ]) ?>
                                            </div><div class="ml-2">-</div>
                                            <div class="w-25 ml-2">
                                                <?= $this->Form->input("post2",[
                                                    "type"=>"text",
                                                    "class"=>"form-control ",
                                                    "label"=>false,
                                                    "maxlength"=>4,
                                                    "onKeyUp"=>"AjaxZip3.zip2addr('post1','post2','prefecture','city','space');"
                                                ]) ?>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <label>都道府県</label>
                                                <select name="prefecture" class="form-control w-75" >
                                                <?php foreach($array_prefecture as $key=>$value): ?>
                                                    <option value="<?= $key ?>" ><?= $value ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <?= $this->Form->input("city",[
                                                    "type"=>"text",
                                                    "class"=>"form-control ",
                                                    "label"=>"市区町村",
                                                ]) ?>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <?= $this->Form->input("space",[
                                                    "type"=>"text",
                                                    "class"=>"form-control ",
                                                    "label"=>"番地",
                                                ]) ?>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <?= $this->Form->input("build",[
                                                    "type"=>"text",
                                                    "class"=>"form-control ",
                                                    "label"=>"ビル・マンション名",
                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-2"><?= __("店舗形態") ?></div>
                                    <div class="col-2">
                                    <span class="badge badge-danger"><?= __("必須") ?></span>
                                    </div>
                                    <div class="col-8">
                                        <select name="prefecture" class="form-control w-75" >
                                            <option value="" >店舗型選択</option>
                                            <?php foreach($array_shop as $key=>$value): ?>
                                                <option value="<?= $key ?>" ><?= $value ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
  </section>

</main>


