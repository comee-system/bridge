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
        <h1 class="h2">会員一覧</h1>

      </div>
      <?= $this->Flash->render() ?>


        <div class="card mt-3">
            <div class="card-body">
                <h5>会員検索</h5>
                <?= $this->Form->create("",[
                    "method"=>"post",
                    "action"=>"/admin/users"
                ]);?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control("氏名",[
                            "type"=>"text",
                            "name"=>"name",
                            "class"=>"form-control"
                        ])?>
                    </div>
                </div>
                <div class="mt-3">
                <?= $this->Form->submit("検索",[
                    "name"=>"search",
                    "class"=>"btn btn-warning text-white"
                ])?>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
      <div class="table-responsive mt-3">

        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->numbers() ?>
            </ul>
        </div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>機能</th>
              <th>名前</th>
              <th>メールアドレス</th>
              <th>企業</th>
              <th>登録日</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
              <td>
                <a href="/admin/users/delete/<?= $user->id ?>" class="btn-sm btn-danger confirm"  >削除</a>
                <a href="/admin/users/edit/<?= $user->id ?>" class="btn-sm btn-primary">編集</a>
              </td>
              <td><?= h($user->sei) ?><?= h($user->mei) ?></td>
              <td><?= h($user->email) ?></td>
              <td><?= h($user->busyo) ?></td>
              <td><?= h(date("Y/m/d H:i:s",strtotime($user->created))) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


<?php /*
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
*/?>
