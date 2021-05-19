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
        <h1 class="h2">物件一覧</h1>

      </div>
      <?= $this->Flash->render() ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <?= $this->Form->create($builds,[
                    "url"=>[
                        'action'=>"index",
                        'controller'=>"meeting",
                    ],
                    'method'=>"POST"
                ])?>
                <div class="row">
                    <div class="col-md-3">
                        <label>物件名</label><br />
                        <?= $this->Form->text("name",[
                            'class'=>"form-control",
                            "required"=>false
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <label>企業名</label><br />
                        <?= $this->Form->text("company",[
                            'class'=>"form-control",
                            "required"=>false
                        ])?>
                    </div>
                    <div class="col-md-3">
                        <label>ステータス</label>
                        <?= $this->Form->select("build_status",$array_build_status,[
                            'class'=>"form-control",
                            'empty'=>'-',
                            "required"=>false
                        ])?>
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
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->numbers() ?>
            </ul>
        </div>

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

            <?php foreach($builds as $value): ?>
                <tr>
                <td><a href="/admin/meeting/detail/<?=$value->id?>"><?= h($value->name) ?></a></td>
                <td><?= h($value->Users['company']) ?></td>
                <?php
                    $shop_type = (isset($array_shop[$value->shop_type]))?$array_shop[$value->shop_type]:"";
                ?>
                <td><?= h($shop_type) ?></td>
                <?php
                    $pref = (isset($array_prefecture[$value->pref]))?$array_prefecture[$value->pref]:"";
                ?>
                <td>
                    <?= h($pref) ?>
                </td>
                <td><?= h(number_format($value->shop_area)) ?>坪</td>
                <td><?= h($array_build_status[ $value->build_status ]) ?></td>
                <td><?= date("Y/m/d",strtotime($value->created))?></td>
                <td>
                    <?php if($value->start): ?>
                        <?= date("Y/m/d",strtotime($value->start))?>
                    <?php else: ?>

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
