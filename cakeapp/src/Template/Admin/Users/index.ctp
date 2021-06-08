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
                    "url"=>[
                        "action"=>"index",
                        "controller"=>"users"
                    ]
                ]);?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control("氏名",[
                            "type"=>"text",
                            "name"=>"name",
                            "class"=>"form-control",
                            "value"=>$this->request->getData("name")
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control("企業名",[
                            "type"=>"text",
                            "name"=>"company",
                            "class"=>"form-control",
                            "value"=>$this->request->getData("company")
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <label>会員ステータス</label>
                        <?= $this->Form->select("agree",$array_agreement_status,[
                            "empty"=>true,
                            "class"=>"form-control",
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <label>業種</label>
                        <?= $this->Form->select("job",$array_job,[
                            "empty"=>true,
                            "class"=>"form-control",
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
            <tr class="text-center">
              <th><?= __("機能") ?></th>
              <th><?= __("会員氏名") ?></th>
              <th><?= __("メールアドレス") ?></th>
              <th><?= __("企業名") ?></th>
              <th nowrap><?= __("業種") ?></th>
              <th nowrap><?= __("会員<br />ステータス") ?></th>
              <th><?= __("権限") ?></th>
              <th><?= __("登録日") ?></th>
              <th><?= __("更新日") ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
              <td style="width:120px;">
              <!--
                <a href="/admin/users/delete/<?= $user->id ?>" class="btn-sm btn-danger confirm"  >削除</a>
              -->
                <a href="/admin/users/edit/<?= $user->id ?>" class="btn-sm btn-primary">編集</a>
              </td>
              <td><?= h($user->sei) ?><?= h($user->mei) ?></td>
              <td><?= h($user->email) ?></td>
              <td><?= h($user->company) ?></td>
              <td>
                <?php if(!empty($array_job[$user->job])):?>
                <?= h($array_job[$user->job]) ?>
                <?php endif; ?>
              </td>
              <td><?= h($array_agreement_status[$user->agree]) ?></td>
              <td><?= h($array_role[$user->role]) ?></td>
              <td><?= h(date("Y/m/d H:i:s",strtotime($user->created))) ?></td>
              <td><?= h(date("Y/m/d H:i:s",strtotime($user->modified))) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

