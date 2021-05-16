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
                            <td><?= h($builds->Users['company']) ?></td>
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
        <div class="card mb-4 mt-2 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">

                        <h5><?= h($comment->first()[ 'Users' ]["company"]) ?></h5>
                        <p>
                            <?= h($comment->first()[ 'Users' ][ 'sei' ])?>
                            <?= h($comment->first()[ 'Users' ][ 'mei' ])?>
                        </p>
                    </div>
                    <?php if($code == "tenant"): ?>
                    <div class="col-md-4">
                        <div class="d-flex">
                            <?=$this->Form->select("status",$array_build_status,[
                                "class"=>"form-control w-50",
                                "empty"=>"-"
                            ])?>
                            <?= $this->Form->control("ステータス更新",[
                                "class"=>"btn-sm btn-warning text-white ml-2 text-center w-100",
                                "name"=>"status_edit",
                                "label"=>false,
                                "value"=>"ステータス更新",
                                "type"=>"button"
                            ])?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <?php if($code == "tenant"): ?>
            <?= $this->Form->create("",[
                    'action'=>"/regist/".$code."/".$id."/".$tenant_id,
                    'method'=>"POST",
                    'enctype' => 'multipart/form-data'
                ])?>

        <?php else: ?>
            <?= $this->Form->create("",[
                    'action'=>"/regist/".$code."/".$id,
                    'method'=>"POST",
                    'enctype' => 'multipart/form-data'
                ])?>
        <?php endif; ?>
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
                <a href="/admin/meeting/detail/<?=$builds->id?>" class="btn btn-secondary">戻る</a>
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
        <div class=" mt-3 w-75 <?=$float?> ">
            <div class="card mb-4 shadow-sm <?=$bg?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <?php if($value->readflag == 1):?>
                                <span class="badge badge-secondary"><?= h($array_read[$value->readflag]) ?></span>
                            <?php else: ?>
                                <span class="badge badge-success text-white"><?= h($array_read[$value->readflag]) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <p><?= nl2br($value->comment) ?></p>
                        </div>
                        <div class="col-md-6 text-right mt-1">
                            <?= date(date("Y/m/d H:i:s",strtotime($value->created))) ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(isset($value->file) && $value->file): ?>
                                <a href="/upload/<?=h($value->file)?>" class="btn-sm btn-warning text-white w-auto" ><?= h($value->filename) ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <br clear=all />
        <?php endforeach; ?>

    </main>
  </div>
</div>



