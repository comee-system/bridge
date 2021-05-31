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
        <h1 class="h2">テナント一覧</h1>

      </div>
      <?= $this->Flash->render() ?>


        <div class="card mt-3">
            <div class="card-body">
                <h5>テナント検索</h5>
                <?= $this->Form->create("",[
                    "method"=>"post",
                    "url"=>[
                        'action'=>"tenant",
                        "controller"=>"users"
                    ]
                ]);?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control("テナント名",[
                            "type"=>"text",
                            "name"=>"tenantname",
                            "class"=>"form-control",
                            "value"=>$this->request->getData("tenantname")
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
              <th>氏名</th>
              <th>企業名</th>
              <th>業種</th>
              <th>テナント名</th>
              <th>登録日</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tenant as $value): ?>
            <tr>
              <td>
                <a href="/admin/users/tenantdelete/<?= $value->id ?>" class="btn-sm btn-danger confirm"  >削除</a>
                <a href="/admin/users/tenantedit/<?= $value->id ?>" class="btn-sm btn-primary">編集</a>
              </td>
              <td>
                <?= h($value->Users['sei']) ?>
                <?= h($value->Users['mei']) ?>
              </td>
              <td>
                <?= h($value->Users['company']) ?>
              </td>
              <td>
                <?php if(!empty($array_job[$value->job])): ?>
                <?= h($array_job[$value->job]) ?>
                <?php endif; ?>
              </td>
              <td>
                <?= h($value->name) ?>
              </td>
              <td>
                <?= h(date("Y/m/d H:i:s",strtotime($value->created))) ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
