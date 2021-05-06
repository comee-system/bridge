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

                <div class="row">
                    <div class="col-md-12">
                        <p>ID : <?= $compnent->setId($builds->id) ?></p>
                        <p class="h5"><?= h($builds->name) ?></p>
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
                            <td><?= h($builds->Users['busyo']) ?></td>
                            <td><?= h($array_prefecture[$builds->pref]) ?></td>
                            <td><?= h($builds->shop_area) ?>坪</td>
                            <td><?= h($array_build_status[$builds->build_status]) ?></td>
                            <td><?= h(date("Y/m/d",strtotime($builds->created))) ?></td>
                            <td><?= h(date("Y/m/d",strtotime($builds->start))) ?></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
        <?= $this->Form->create("",[
                    'action'=>"/regist/".$code."/".$id,
                    'method'=>"POST",
                    'enctype' => 'multipart/form-data'
                ])?>

        <div class="row">
            <div class="col-md-12">
                <?= $this->Form->textarea("comment",[
                    "class"=>"form-control"
                ])?>
            </div>
            <div class="col-md-12 mt-3">
                <small>添付するファイルを選択してください。</small>
                <small class="text-danger">※登録できるファイルサイズは５MB以下までです。</small>
                <?= $this->Form->control('fileupload', [
                    "type" => "file",
                    "label" => false
                    ]); ?>
            </div>
            <div class="col-md-12 mt-2">
                <?= $this->Form->button("送信",[
                    "type"=>"submit",
                    "class"=>"btn btn-primary",
                    "name"=>"regist",
                    "value"=>"on"
                ])?>
            </div>
        </div>
        <?= $this->Form->end(); ?>

        <hr size=1 />
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->numbers() ?>
            </ul>
        </div>

        <?php foreach( $comment as $key=>$value):?>
        <?php
            $float = "";
            $bg = "";
            if($value->response == 1){
                $float = "float-right"; //admin
                $bg = "bg-light";
            }
        ?>
        <div class="row mt-3 w-75 <?=$float?> ">
            <div class="card mb-4 shadow-sm <?=$bg?>">
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
        <?php endforeach; ?>

    </main>
  </div>
</div>



