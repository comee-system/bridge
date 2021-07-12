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
        <h1 class="h2">物件一覧</h1>

      </div>
      <?= $this->Flash->render() ?>


        <div class="card mt-3">
            <div class="card-body">
                <h5>物件検索</h5>
                <?= $this->Form->create("",[
                    "method"=>"post",
                    "url"=>[
                        "action"=>"build",
                        "controller"=>"users"
                    ]
                ]);?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control("物件名",[
                            "type"=>"text",
                            "name"=>"name",
                            "class"=>"form-control",
                            "value"=> $this->request->getData("name")
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control("企業名",[
                            "type"=>"text",
                            "name"=>"company",
                            "class"=>"form-control",
                            "value"=> $this->request->getData("company")
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control("会員氏名",[
                            "type"=>"text",
                            "name"=>"username",
                            "class"=>"form-control",
                            "value"=> $this->request->getData("username")
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <label>物件ステータス</label>
                        <?= $this->Form->select(
                            "物件ステータス",
                            $array_build_status
                            ,[
                                'empty'=>true,
                                'class'=>"form-control"
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

        <table class="table table-striped table-sm" style="width:2200px;">
          <thead>
            <tr>
              <th><?= __("機能") ?></th>
              <th><?= __("物件名") ?></th>
              <th><?= __("企業名") ?></th>
              <th><?= __("会員氏名") ?></th>
              <th><?= __("メールアドレス") ?></th>
              <th><?= __("所在地") ?></th>
              <th><?= __("契約面積") ?></th>
              <th><?= __("物件<br />ステータス") ?></th>
              <th><?= __("マッチング数") ?></th>
              <th><?= __("物件登録日") ?></th>
              <th><?= __("マッチング開始日") ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($builds as $value): ?>
            <tr>
                <td>
                    <a href="/admin/users/builddelete/<?= $value->id ?>" class="btn-sm btn-danger confirm"  >削除</a>
                    <a href="/admin/users/buildregist/<?= $value->id ?>" class="btn-sm btn-primary">編集</a>
                </td>
                <td><?= h($value->name )?></td>
                <td><?= h($value->Users[ 'company' ] )?></td>
                <td><?= h($value->Users[ 'sei' ] )?><?= h($value->Users[ 'mei' ] )?></td>
                <td><?= h($value->Users[ 'email' ] )?></td>
                <td>
                    <?php if(isset($array_prefecture[$value->pref])): ?>
                    <?= h($array_prefecture[$value->pref] )?>
                    <?php endif; ?>
                    <?= h($value->city )?>
                </td>
                <td><?= h(number_format($value->shop_area)) ?>坪</td>
                <td>
                <?php if(isset($array_tenant_status[$value->status]) ): ?>
                    <?= h($array_tenant_status[$value->status]) ?>
                <?php endif; ?>
                </td>
                <td>
                    <?php if(isset($commentCount[ $value->id ][ 'cnt' ])): ?>
                    <?= h($commentCount[ $value->id ][ 'cnt' ]) ?>
                    <?php endif; ?>
                </td>
                <td><?= date("Y/m/d H:i:s",strtotime($value->created)) ?></td>
                <td>
                    <?php if(isset($commentCount[ $value->id ][ 'stdate' ])): ?>
                    <?= $commentCount[ $value->id ][ 'stdate' ] ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
