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
        <h1 class="h2"><?= __("仮会員インポート") ?></h1>

      </div>
      <?= $this->Flash->render() ?>

        <div class="card mt-3">
            <div class="card-body">
                <?= $this->Form->create("",[
                    "method"=>"post",
                    "action"=>"",
                    "enctype" => "multipart/form-data"
                ]);?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control("ファイル",[
                            "type"=>"file",
                            "name"=>"file",
                        ])?>
                    </div>
                </div>
                <div class="mt-3 d-flex">
                    <div >
                        <?= $this->Form->submit("インポート",[
                            "name"=>"import",
                            "class"=>"btn btn-warning text-white"
                        ])?>
                    </div>
                    <div class="ml-3">
                        <a href="/csv/temporary_member_import_format.csv" class="btn btn-success text-white" >CSVフォーマット</a>
                    </div>

                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>

    </main>
  </div>
</div>
