<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<?= $this->element('breadcrumbs') ?>
<main>
  <div class="container">
    <section class="m-5">
        <div class="card">
            <div class="card-header">
                お問い合わせフォーム
            </div>
            <div class="card-body">
                <div class="col-md-12 mx-auto">
                    <?= $this->Flash->render() ?>

                    <?= $this->Form->create("", [
                        'type' => 'post',
                        'url' => ['controller' => 'Questions', 'action' => 'conf'],
                    ]);?>
                        <div class="row">
                            <div class="col-md-12">
                                <label><?= __("会社名") ?></label>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($campany)) $param['value'] = $campany;
                                ?>
                                <?= $this->Form->control("campany",$param);?>
                                <small class="text-primary"><?= __("※個人の方は入力不要です") ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label><?= __("部署") ?></label>
                                <?php
                                    $param = [
                                        "type"=>"text",
                                        "label"=>false,
                                        "class"=>"form-control",
                                    ];
                                    if(!empty($busyo)) $param['value'] = $busyo;
                                ?>
                                <?= $this->Form->control("busyo",$param);?>
                                <small class="text-primary"><?= __("※個人の方は入力不要です") ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                            <label><?= __("姓") ?></label>
                            <span class="badge badge-danger"><?= __("必須") ?></span>
                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($sei)) $param['value'] = $sei;
                            ?>
                            <?= $this->Form->control("sei",$param);?>
                            </div>
                            <div class="col-md-5">
                            <label><?= __("名") ?></label>
                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($mei)) $param['value'] = $mei;
                            ?>
                            <?= $this->Form->control("mei",$param);?>
                            </div>
                            <div class="col-md-12">
                                <?php if(!empty($question->getErrors()[ 'sei' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'sei' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                                <?php if(!empty($question->getErrors()[ 'mei' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'mei' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                            <label><?= __("姓(かな)") ?></label>
                            <span class="badge badge-danger"><?= __("必須") ?></span>
                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($sei_kana)) $param['value'] = $sei_kana;
                            ?>
                            <?= $this->Form->control("sei_kana",$param);?>
                            </div>
                            <div class="col-md-5">
                            <label>名(かな)</label>
                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($mei_kana)) $param['value'] = $mei_kana;
                            ?>
                            <?= $this->Form->control("mei_kana",$param);?>
                            </div>
                            <div class="col-md-12">
                                <?php if(!empty($question->getErrors()[ 'sei_kana' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'sei_kana' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                                <?php if(!empty($question->getErrors()[ 'mei_kana' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'mei_kana' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-12">
                            <label><?= __("メールアドレス") ?></label>
                            <span class="badge badge-danger"><?= __("必須") ?></span>

                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($mail)) $param['value'] = $mail;
                            ?>
                            <?= $this->Form->control("mail",$param);?>

                            </div>
                            <div class="col-md-12">
                                <?php if(!empty($question->getErrors()[ 'mail' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'mail' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                            <label><?= __("電話番号") ?></label>
                            <span class="badge badge-danger"><?= __("必須") ?></span>

                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($tel)) $param['value'] = $tel;
                            ?>
                            <?= $this->Form->control("tel",$param);?>

                            </div>
                            <div class="col-md-12">
                                <?php if(!empty($question->getErrors()[ 'tel' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'tel' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                            <label><?= __("郵便番号") ?></label>
                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                    "onKeyUp"=>"AjaxZip3.zip2addr(this,'','pref','address');"
                                ];
                                if(!empty($zip)) $param['value'] = $zip;
                            ?>
                            <?= $this->Form->control("zip",$param);?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                            <label><?= __("都道府県") ?></label>
                            <?php
                                $param = [
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($pref)) $param['value'] = $pref;
                            ?>
                            <?= $this->Form->select("pref",$array_prefecture,$param);?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                            <label><?= __("市区町村・番地") ?></label>
                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($address)) $param['value'] = $address;
                            ?>
                            <?= $this->Form->control("address",$param);?>
                            </div>
                        </div>



                        <div class="row mt-2">
                            <div class="col-md-12">
                            <label>問合せ内容</label>
                            <span class="badge badge-danger"><?= __("必須") ?></span>

                            <?php
                                $param = [
                                    "type"=>"textarea",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($note)) $param['value'] = $note;
                            ?>
                            <?= $this->Form->control("note",$param);?>

                            </div>
                            <div class="col-md-12">
                                <?php if(!empty($question->getErrors()[ 'note' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'note' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3 m-auto">
                                <?= $this->Form->submit("確認",
                                [
                                    'name'=>"conf",
                                    'class'=>"btn btn-success form-control"
                                ])?>
                            </div>
                        </div>
                    <?= $this->Form->end()?>
                </div>
            </div>
        </div>
    </section>
  </div>
</main>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
