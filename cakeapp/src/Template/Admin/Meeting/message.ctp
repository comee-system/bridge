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

      <?= $this->Flash->render() ?>
        <?= $this->Form->create("",[
                    'action'=>"/message/".$build_id,
                    'method'=>"POST",
                    'enctype' => 'multipart/form-data'
        ])?>
        <div class="card mb-4 shadow-sm mt-3">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12 d-flex">
                        <h5><?= h($builds->name) ?></h5>
                        <small class="mt-1 ml-3"><?= h($array_prefecture[$builds->pref]) ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4 shadow-sm mt-3">
            <div class="card-body">
                <div class="row">
                    <?php
                        $num = 1;
                        foreach($tenants as $key=>$value ):?>
                        <div class="col-md-2">
                            <?=$num?>.
                            <?= h($value->Users['sei']) ?>
                            <?= h($value->Users['mei']) ?>
                            <?= $this->Form->hidden("tenant_id[]",[
                                'value'=>$value->id
                            ])?>
                        </div>
                    <?php
                        $num++;
                        endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->Form->control("comment",[
                    "type"=>"textarea",
                    "class"=>"form-control",
                    "label"=>"メッセージ"
                ])?>
            </div>
            <div class="col-md-12 mt-3">
                <p>添付するファイルを選択してください。</p>
                <p class="text-danger">※登録できるファイルサイズは５MB以下までです。</p>
                <?= $this->Form->control('fileupload', [
                    "type" => "file",
                    "label" => false


                    ]); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <a href="/admin/meeting/address/<?=$build_id?>" class="btn btn-secondary w-100 text-white">戻る</a>
            </div>
            <div class="col-md-2">
                <?= $this->Form->button("送信",[
                    "class"=>"btn btn-primary",
                    "name"=>"regist",
                    "value"=>"send"
                ]) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </main>
  </div>
</div>
