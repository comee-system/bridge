

<?php echo $this->element('admin_head'); ?>

<div class="container-fluid">
  <div class="row">
  <?php echo $this->element('menu'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">お問い合わせ</h1>

      </div>



      <div class="table-responsive mt-3">



        <table class="table">

          <tbody>
            <tr>
                <th><?= __("名前") ?></th>
                <td>
                    <?= h($question->sei) ?>
                    <?= h($question->mei) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("かな") ?></th>
                <td>
                    <?= h($question->sei_kana) ?>
                    <?= h($question->mei_kana) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("企業名") ?></th>
                <td>
                    <?= h($question->campany) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("部署") ?></th>
                <td>
                    <?= h($question->busyo) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("メールアドレス") ?></th>
                <td>
                    <?= h($question->mail) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("電話番号") ?></th>
                <td>
                    <?= h($question->tel) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("住所") ?></th>
                <td>
                    <?= h($question->zip) ?><br />
                    <?php if(!empty( $array_prefecture[$question->pref] )): ?>
                    <?= h($array_prefecture[$question->pref]) ?>
                    <?php endif; ?>
                    <?= h($question->address) ?>
                </td>
            </tr>
            <tr>
                <th><?= __("問合せ") ?></th>
                <td>
                    <?= nl2br(h($question->note)) ?>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
