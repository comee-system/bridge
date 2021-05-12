<?php
$crumb = "会員登録";
if($this->request->getParam("action") == "edit") $crumb = "会員更新";
$this->Html->addCrumb($crumb, '');

?>
<?= $this->element('breadcrumbs') ?>
<main>
    <div class="container">
        <div class="alert alert-dark" role="alert">
            <h5><?= __($crumb) ?></h5>
        </div>
        <?= $this->Flash->render() ?>
        <?= $this->element("useraddconf")?>

    </div><!-- /.container -->

</main>
