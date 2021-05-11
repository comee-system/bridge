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
                        'url' => ['controller' => 'Questions', 'action' => 'index'],
                    ]);?>
                        <div class="row">
                            <div class="col-md-3">姓名</div>
                            <div class="col-md-5">
                                <?= h($question['sei']) ?>
                                <?= $this->Form->hidden("sei",[
                                    "value"=>$question['sei']
                                ]);?>
                                <?= h($question['mei']) ?>
                                <?= $this->Form->hidden("mei",[
                                    "value"=>$question['mei']
                                ]);?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">企業名</div>
                            <div class="col-md-5">
                                <?= h($question['campany']) ?>
                                <?= $this->Form->hidden("campany",[
                                    "value"=>$question['campany']
                                ]);?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">メールアドレス</div>
                            <div class="col-md-5">
                                <?= h($question['mail']) ?>
                                <?= $this->Form->hidden("mail",[
                                    "value"=>$question['mail']
                                ]);?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">電話番号</div>
                            <div class="col-md-5">
                            <?= h($question['tel']) ?>
                            <?= $this->Form->hidden("tel",[
                                "value"=>$question['tel']
                            ]);?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">問合せ内容</div>
                            <div class="col-md-5">
                                <?= nl2br(h($question['note']))?>
                                <?= $this->Form->hidden("note",[
                                    "value"=>$question['note']
                                ]);?>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-3 ">
                                <?= $this->Form->submit("戻る",
                                [
                                    'name'=>"back",
                                    'class'=>"btn btn-secondary form-control"
                                ])?>
                            </div>
                            <div class="col-md-3 ">
                                <?= $this->Form->submit("送信",
                                [
                                    'name'=>"send",
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
