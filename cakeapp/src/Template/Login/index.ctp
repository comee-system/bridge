<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<main>
  <div class="container">
    <section class="m-5">
        <div class="col-md-6 mx-auto">
            <?=$this->Form->create($member, [
                'type' => 'post',
                'url' => ['controller' => 'login', 'action' => 'index'],
            ]);?>

            <div class="row">
                <?=$this->Form->input( "email", [ "type" => "text",
                    "label" => "メールアドレス",
                    "placeholder"=>"メールアドレスを入力してください",
                    "class"=>"form-control"
                ] );
                ?>
            </div>
            <div class="row mt-3">
                <?=$this->Form->input( "password", [ "type" => "text",
                    "label" => "パスワード",
                    "placeholder"=>"パスワードを入力してください",
                    "class"=>"form-control"
                ] );
                ?>

            </div>
            <div class="row mt-3">
                <?=$this->Form->input("ログイン",[
                    "type"=>"submit",
                    "value"=>"on",
                    'class'=>"btn btn-primary"
                ]);?>
            </div>
            <?=$this->Form->end()?>
        </div>
    </section>
  </div>
</main>
