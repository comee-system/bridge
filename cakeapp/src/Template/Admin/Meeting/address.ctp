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
                    'method'=>"POST"
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
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="d-flex flex-row-reverse" >
                    <a href="" class="btn btn-secondary">戻る</a>
                    <a href="/admin/meeting/message/1" class="btn btn-primary mr-3">メッセージ作成</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 ">
                <table class="table table-bordered">
                    <tr class="text-center bg-secondary text-white ">
                        <th>氏名</th>
                        <th>企業名</th>
                        <th>業種</th>
                        <th>テナント名</th>
                        <th>選択</th>
                    </tr>
                    <tr>
                        <td>伊野太郎</td>
                        <td>〇〇会社</td>
                        <td>飲食</td>
                        <td>餃子店</td>
                        <td class="text-center">
                            <?= $this->Form->checkbox("select",[
                                "class"=>"",
                                "value"=>1
                            ])?>
                        </td>
                    </tr>
                    <tr>
                        <td>伊野太郎</td>
                        <td>〇〇会社</td>
                        <td>飲食</td>
                        <td>餃子店</td>
                        <td class="text-center">
                            <?= $this->Form->checkbox("select",[
                                "class"=>"",
                                "value"=>1
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
  </div>
</div>
