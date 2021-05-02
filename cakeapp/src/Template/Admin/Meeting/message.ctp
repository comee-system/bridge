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
                    'action'=>"",
                    'method'=>"POST",
                    'enctype' => 'multipart/form-data'
        ])?>
        <div class="card mb-4 shadow-sm mt-3">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12 d-flex">
                        <h5>表参道のお店</h5>
                        <small class="mt-1 ml-3">東京都</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4 shadow-sm mt-3">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-2">1. 佐藤太郎</div>
                    <div class="col-md-2">2. 鈴木花子</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $this->Form->control("message",[
                    "type"=>"textarea",
                    "class"=>"form-control",
                    "label"=>"メッセージ"
                ])?>
            </div>
            <div class="col-md-12 mt-3">
                <p>添付するファイルを選択してください。</p>
                <p class="text-danger">※登録できるファイルサイズは５MB以下までです。</p>
                <?= $this->Form->control('field', [
                    "type" => "file",
                    "label" => false


                    ]); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <a href="" class="btn btn-secondary w-100 text-white">戻る</a>
            </div>
            <div class="col-md-2">
                <a href="" class="btn btn-warning w-100 text-white">送信</a>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </main>
  </div>
</div>
