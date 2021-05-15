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
            <?= $this->element('mymenu',['type'=>$type]); ?>
            <div class="col-md-8 order-md-10 mb-4">

                <?= $this->element("mystep",["editflag"=>$editflag]) ?>

                <div class="row mt-5 ">
                    <?php if($type == "fin"): ?>
                        <div class="card-deck col-md-12 text-left">
                            <div class="card shadow-sm cardheight">
                                <div class="card-body">
                                    <p class="text-center">登録ありがとうございました。</p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                    <?= $this->Form->create(null, [
                        'url' => ['action' => '/buildregist/'.$id],
                        'type' => 'post',
                        'enctype' => 'multipart/form-data',
                        "class"=>"w-100"
                    ]); ?>
                    <?= $this->element("buildingregist",['admin'=>false,"editflag"=>$editflag])?>
                    <?= $this->Form->end() ?>
                    <?php endif; ?>
                </div>


            </div>
        </div>

    </div>
  </section>

</main>


