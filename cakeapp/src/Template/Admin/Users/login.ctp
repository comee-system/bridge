<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<link href="/css/signin.css" rel="stylesheet">
<main class="form-signin">
<?= $this->Flash->render() ?>

<?= $this->Form->create() ?>
    <img class="mb-4" src="/img/bridge.gif" alt=""  height="57">
    <h1 class="h3 mb-3 fw-normal">サインインする</h1>

    <label>ID</label>
    <input type="text" name="username" id="username" class="form-control" />
    <label>PASSWORD</label>
    <input type="text" name="password" id="password" class="form-control" />
    <div class="mt-4">
    <?= $this->Form->button(__('ログイン'),[
            'type'=>'submit',
            'class'=>'form-control btn btn-primary',
            'name'=>'login'

            ]) ?>
    </div>
    <?= $this->Form->end() ?>
</main>


