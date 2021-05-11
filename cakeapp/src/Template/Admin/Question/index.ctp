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
        <h1 class="h2">お問い合わせ一覧</h1>

      </div>
      <?= $this->Flash->render() ?>


        <div class="card mt-3">
            <div class="card-body">
                <h5>お問い合わせ検索</h5>
                <?= $this->Form->create("",[
                    "method"=>"post",
                    "action"=>"/admin/question"
                ]);?>
                <div class="row">
                    <div class="col-md-3">
                        <?= $this->Form->control("",[
                            "type"=>"text",
                            "name"=>"name",
                            "class"=>"form-control"
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
              <th>#</th>
              <th>名前</th>
              <th>受信日</th>
              <th>問合せ内容</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
              <td>
                <a href="./view/<?= h($question->id) ?>" class="btn-sm btn-warning text-white">詳細</a>
              </td>
              <td>
                <?= h($question->sei) ?>
                <?= h($question->mei) ?>
              </td>
              <td>
                <?= h(date("Y/m/d H:i:s",strtotime($question->created))) ?>
              </td>
              <td>
                <?= h(mb_substr($question->note,0,10,'UTF-8')) ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



