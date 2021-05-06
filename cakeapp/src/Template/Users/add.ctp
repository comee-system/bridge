<?php
$this->Html->addCrumb('会員登録', '');
?>
<?= $this->element('breadcrumbs') ?>
<main>
    <div class="container">
        <div class="alert alert-dark" role="alert">
            <h5><?= __("会員登録") ?></h5>
        </div>
        <?= $this->Flash->render() ?>
        <?= $this->element("useradd")?>

    </div><!-- /.container -->

</main>
