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
            <?= $this->Flash->render() ?>

            <?=$this->Form->create("", [
                'type' => 'post',
                'url' => ['controller' => 'login', 'action' => 'password'],
            ]);?>
            <h5>パスワード再設定</h5>
            <p>
            ご登録いただいたメールアドレスを入力してください。<br />パスワード変更用のURLをお送りします。
            </p>
            <div class="row mt-5">
                <label>メールアドレス
                <span class="badge badge-danger">必須</span></label>
                <?=$this->Form->text( "email", [ "type" => "text",

                    "placeholder"=>"メールアドレスを入力してください",
                    "class"=>"form-control",
                    'div'=>false
                ] );
                ?>
            </div>
            <div class="row mt-3">
                <?=$this->Form->input("送信する",[
                    "type"=>"submit",
                    "value"=>"on",
                    'class'=>"btn btn-warning w-100 text-white",
                    'div'=>false
                ]);?>
            </div>
            <?=$this->Form->end()?>
            パスワード変更用のURLが届かない場合やメールアドレスをお忘れの方は、
            <?=$this->Html->link(
                    'お問い合わせフォーム',
                    D_LINK_QUESTION,
                );?>
            からご連絡ください。


        </div>
    </section>
  </div>
</main>
