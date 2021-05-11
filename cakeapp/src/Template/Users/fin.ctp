<?php
$this->Html->addCrumb('会員登録完了', '');
?>
<?= $this->element('breadcrumbs') ?>
<main>
    <div class="container">
        <div class="alert alert-dark" role="alert">
            <h5><?= __("会員登録完了") ?></h5>
        </div>

        <section class="mb-5 text-center">
        <?= $this->Flash->render() ?>
            <div class="border">
                <p class="mt-3">会員登録ありがとうございます。</p>

                <p class="mt-3">ログイン画面よりログインしてください。</p>
            </div>
            <div class="mt-3 text-center">
                <a href="/login" class="btn btn-warning text-white">ログイン画面へ</a>
            </div>

        </section>
    </div><!-- /.container -->

</main>
