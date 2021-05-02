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
        <h1 class="h2">商談ルーム一覧</h1>

      </div>
      <?= $this->Flash->render() ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <?= $this->Form->create("",[
                    'action'=>"",
                    'method'=>"POST"
                ])?>
                <div class="row">
                    <div class="col-md-3">
                        <label>物件名</label><br />
                        <input type="text" name="name" value="" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <label>企業名</label><br />
                        <input type="text" name="company" value="" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <label>ステータス</label><br />
                        <select name="status" class="form-control" >
                        <option value="">-</option>
                        <?php foreach($array_status as $key=>$value): ?>
                            <option value="<?= $key ?>" ><?= $value ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="text-right">
                        <input type="submit" name="search" value="検索" class="btn btn-sm btn-block btn-primary w-25" />
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>物件名称</th>
              <th>企業名</th>
              <th>業種</th>
              <th>所在地</th>
              <th>店舗面積</th>
              <th>ステータス</th>
              <th>物件登録日</th>
              <th>募集開始日</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="/admin/meeting/detail/1">表参道店</a></td>
              <td>〇〇会社</td>
              <td>飲食</td>
              <td>東京都渋谷区</td>
              <td>230m<sup>2</sup></td>
              <td>公開中</td>
              <td>2021/04/01</td>
              <td>2021/05/01</td>
            </tr>
            <tr>
                <td><a href="/admin/meeting/detail/1">表参道店2</a></td>
              <td>〇〇会社</td>
              <td>飲食</td>
              <td>東京都渋谷区</td>
              <td>230m<sup>2</sup></td>
              <td>公開中</td>
              <td>2021/04/01</td>
              <td>2021/05/01</td>
            </tr>

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
