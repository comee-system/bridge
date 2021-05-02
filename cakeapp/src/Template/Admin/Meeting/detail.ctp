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
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">商談ルーム詳細</h1>

      </div>
      <?= $this->Flash->render() ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <?= $this->Form->create("",[
                    'action'=>"",
                    'method'=>"POST"
                ])?>
                <div class="row">
                    <div class="col-md-12">
                        <p>ID : S210316</p>
                        <p class="h5">表参道のお店</p>
                    </div>
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>企業名</th>
                            <th>所在地</th>
                            <th>店舗面積</th>
                            <th>ステータス</th>
                            <th>物件登録日</th>
                            <th>募集開始日</th>
                        </tr>
                        <tr>
                            <td>〇〇企業</td>
                            <td>東京都</td>
                            <td>30坪</td>
                            <td>交渉中</td>
                            <td>2021/05/01</td>
                            <td>2021/05/05</td>
                        </tr>
                    </table>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <h5>物件担当者</h5>
                    <div class="col-md-2">
                        <span class="badge badge-warning">未読</span>
                    </div>
                    <div class="col-md-4">
                        〇〇さん
                        <p>ご案内いたします。</p>
                    </div>
                    <div class="col-md-6 text-right">
                        2021/05/01 07:00:00
                    </div>
                </div>
            </div>
        </div>

        <hr size=2 />
        <div class="row">
            <div class="col-md-6">
                <h5>テナント登録者</h5>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/meeting/address/1" class="btn btn-primary text-white">新規メッセージ</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <h5>〇〇さん</h5>
                        <div class="col-md-2">
                            <span class="badge badge-secondary">既読</span>
                        </div>
                        <div class="col-md-4">
                            〇〇さん
                            <p>ご案内いたします。</p>
                        </div>
                        <div class="col-md-6 text-right mt-1">
                            2021/05/01 07:00:00
                            <p><span class="bg-secondary text-white p-1">ステータス</span>：交渉中</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <h5>▼▼さん</h5>
                        <div class="col-md-2">
                            <span class="badge badge-secondary">既読</span>
                        </div>
                        <div class="col-md-4">
                            〇〇さん
                            <p>ご案内いたします。</p>
                        </div>
                        <div class="col-md-6 text-right mt-1">
                            2021/05/01 07:00:00
                            <p><span class="bg-secondary text-white p-1">ステータス</span>：交渉中</p>
                        </div>
                    </div>
                </div>
            </div>
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
