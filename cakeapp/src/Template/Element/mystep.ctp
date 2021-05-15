<?php if($editflag != false):?>
<div role="content">
    <div class="widget-body">
        <div class="row ">
            <form id="wizard-1" novalidate="novalidate" class="w-100">
                <div id="bootstrap-wizard-1" class="col-12">
                    <div class="form-bootstrapWizard">
                        <ul class="bootstrapWizard form-wizard">
                            <li class="active" data-target="#step1"> <span class="step">1</span>
                            <span class="title"><?= __("STEP1 <br />物件情報入力") ?></span>
                            </li>
                            <?php $act2 = ""; if($type == "conf" || $type == "fin") $act2 = "active";?>
                            <li data-target="#step2" class="<?= $act2 ?>">
                            <span class="step">2</span>
                            <span class="title"><?= __("STEP2 <br />入力内容の確認") ?></span> </li>
                            <?php $act3 = ""; if($type == "fin") $act3 = "active";?>
                            <li data-target="#step3" class="<?= $act3 ?>">
                            <span class="step">3</span>
                            <span class="title"><?= __("STEP3 <br />物件登録完了") ?></span>  </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
