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
                    'method'=>"POST",
                    'enctype' => 'multipart/form-data'
                ])?>
                <div class="row ">
                    <h5>宛先検索</h5>
                    <div class="col-md-3">
                        <?= $this->Form->control("company",[
                            "type"=>"text",
                            "class"=>"form-control",
                            "label"=>"企業名"
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control("tenant",[
                            "type"=>"text",
                            "class"=>"form-control",
                            "label"=>"テナント名"
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->label('業種');?>
                        <?= $this->Form->select("tenant",$array_job,[
                            "class"=>"form-control",
                            "empty"=>true
                        ])?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <?= $this->Form->control("検索",[
                            "type"=>"submit",
                            "class"=>"btn btn-primary w-25",
                            "name"=>"search"
                        ])?>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>

        <?= $this->Form->create("",[
                    'action'=>"message/".$build_id,
                    'method'=>"POST"
            ])?>
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="d-flex flex-row-reverse" >
                        <a href="/admin/meeting/detail/<?= h($build_id) ?>" class="btn btn-secondary">戻る</a>
                        <?= $this->Form->button("メッセージ作成",[
                            "class"=>"btn btn-primary mr-3",
                            "name"=>"create",
                            "type"=>"submit"
                        ])?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->numbers() ?>
                    </ul>
                </div>

                <div class="col-md-12 ">
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white ">
                            <th>氏名</th>
                            <th>企業名</th>
                            <th>業種</th>
                            <th>テナント名</th>
                            <th>選択</th>
                        </tr>
                        <?php foreach($tenants as $value):
                            $disabled = false;
                            if(isset($commentCount[$value->id]) && $commentCount[$value->id]) $disabled = true;
                            ?>
                        <tr>
                            <td><?= h($value->Users[ 'sei' ]) ?><?= h($value->Users[ 'mei' ]) ?></td>
                            <td><?= h($value->Users[ 'company' ])?></td>
                            <td>
                                <?php if($value->job): ?>
                                <?= h($array_job[$value->job]) ?>
                                <?php endif; ?>
                            </td>
                            <td><?= $value->name ?></td>
                            <td class="text-center">
                                <?= $this->Form->checkbox("select[]",[
                                    "class"=>"",
                                    "value"=>$value->id,
                                    "hiddenField"=>false,
                                    "disabled"=>$disabled
                                ])?>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        <?= $this->Form->end(); ?>
    </main>
  </div>
</div>
