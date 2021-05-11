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

        <div class="col-md-6 mx-auto">
            <?= $this->Flash->render() ?>

            <h5><?= __("パスワード再設定") ?></h5>
            <p><?= __("変更後のパスワードを入力してください") ?></p>
            <?= $this->Form->create("", [
                "type" => "post",
                "url" => ["controller" => "login", "action" => "edit", "token" => h($this->request->query("token"))],
            ]);?>

            <div class="row">
                <label><?= __("パスワード") ?>
                <span class="badge badge-danger"><?= __("必須") ?></span></label>
                <?= $this->Form->text( "password", [ "type" => "password",
                    "placeholder"=>__("パスワードを入力してください"),
                    "class"=>"form-control",
                    "div"=>false
                ] );
                ?>
            </div>
            <div class="row mt-3">
                <?= $this->Form->input( "open", array(
                    "type" => "checkbox",
                    "label" => __("パスワードを表示する"),
                    "checked" => false
                    ));?>
            </div>
            <div class="row mt-3">
                <p><?= __("下記の条件でパスワードを作成してください") ?></p>
            </div>
            <div class="row">
                <ul>
                    <li><?= __("8文字以上") ?></li>
                    <li><?= __("半角数字を含む") ?></li>
                    <li><?= __("半角英字を含む") ?></li>
                </ul>
            </div>
            <div class="row">
                <label><?= __("新しいパスワード確認用") ?>
                <span class="badge badge-danger"><?= __("必須") ?></span></label>
                <?= $this->Form->text( "password_conf", [ "type" => "password",
                    "placeholder"=>__("パスワードを入力してください"),
                    "class"=>"form-control",
                    "div"=>false
                ] );
                ?>
            </div>

            <div class="row mt-3">
                <?= $this->Form->text("send",[
                    "type" => "submit",
                    "value" => __("送信する"),
                    "class" => "btn btn-warning w-100 text-white",
                    "div"=>false
                ]);?>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </section>
  </div>
</main>
