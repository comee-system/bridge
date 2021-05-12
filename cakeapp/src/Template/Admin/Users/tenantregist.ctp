<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php echo $this->element('admin_head'); ?>

<div class="container-fluid">
  <div class="row">
  <?php echo $this->element('menu'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">テナント情報更新</h1>
      </div>
      <?= $this->Flash->render() ?>
      <?= $this->Form->create(null,[
          "action"=>"tenantedit/".$id,
          "method"=>"POST",

      ])?>
      <?= $this->element("tenantregist",['role'=>"admin"])?>
    <?= $this->Form->end() ?>
    </main>
  </div>
</div>
