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
                    <div class="col-md-3">
                        <?= $this->Form->control("企業名",[
                            "type"=>"text",
                            "name"=>"company",
                            "class"=>"form-control",
                            "value"=>$this->request->getData("company")
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <label><?= __("業種") ?></label>
                        <?= $this->Form->select("job",$array_job,[
                            "class"=>"form-control",
                            "empty"=>true
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control("会員氏名",[
                            "type"=>"text",
                            "name"=>"username",
                            "class"=>"form-control",
                            "value"=>$this->request->getData("username")
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

        <table class="table table-striped table-sm" style="width:2000px;">
          <thead>
            <tr>
              <th><?= __("機能") ?></th>
              <th><?= __("テナント名") ?></th>
              <th><?= __("企業名") ?></th>
              <th><?= __("業種") ?></th>
              <th><?= __("会員氏名") ?></th>
              <th><?= __("希望地") ?></th>
              <th><?= __("商談ルーム数") ?></th>
              <th><?= __("建物坪数") ?></th>
              <th><?= __("賃料") ?></th>
              <th><?= __("登録日") ?></th>
              <th><?= __("更新日") ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tenant as $value):?>
            <tr>
              <td>
                <a href="/admin/users/tenantdelete/<?= $value->id ?>" class="btn-sm btn-danger confirm"  >削除</a>
                <a href="/admin/users/tenantedit/<?= $value->id ?>" class="btn-sm btn-primary">編集</a>
              </td>
              <td><?= h($value->name) ?></td>
              <td><?= h($value->Users['company']) ?></td>
              <td>
                <?php if(!empty($array_job[$value->job])): ?>
                <?= h($array_job[$value->job]) ?>
                <?php endif; ?>
              </td>
              <td>
                <?= h($value->Users['sei']) ?>
                <?= h($value->Users['mei']) ?>
              </td>
              <td><?= h($value->prefline)?></td>
              <td><?= h($value->roomcount)?></td>
              <td>
                <?= h(number_format($value->min_floor))?><small><?= __("坪") ?>～</small>
                <?= h(number_format($value->max_floor))?><small><?= __("坪") ?></small>
              </td>
              <td>
                <?= h(number_format($value->rent_money_min))?><small><?= __("円") ?>～</small>
                <?= h(number_format($value->rent_money_max))?><small><?= __("円") ?></small>
              </td>


                <td><?= h(date("Y/m/d H:i:s",strtotime($value->created))) ?></td>
                <td><?= h(date("Y/m/d H:i:s",strtotime($value->modified))) ?></td>

            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
