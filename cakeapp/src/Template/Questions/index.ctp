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
                            <div class="col-md-5">
                            <label>姓</label>
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
                            <label>名</label>
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
                        <div class="row mt-2">
                            <div class="col-md-12">
                            <label>企業名</label>
                            <span class="badge badge-danger"><?= __("必須") ?></span>

                            <?php
                                $param = [
                                    "type"=>"text",
                                    "label"=>false,
                                    "class"=>"form-control",
                                ];
                                if(!empty($campany)) $param['value'] = $campany;
                            ?>
                            <?= $this->Form->control("campany",$param);?>

                            </div>
                            <div class="col-md-12">
                                <?php if(!empty($question->getErrors()[ 'campany' ][ '_empty' ])): ?>
                                <span class="text-danger"><?= $question->getErrors()[ 'campany' ][ '_empty' ] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                            <label>メールアドレス</label>
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
                            <label>電話番号</label>
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
