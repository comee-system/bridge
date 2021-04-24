<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<main>
  <div class="container">
    <section class="m-5">

        <div class="col-md-6 mx-auto">
            <?= $this->Flash->render() ?>

            <h5>パスワード再設定</h5>
            <p>

            ご登録のメールアドレスにパスワード再設定用URLをお送りいたしました。<br />
            再設定用URLの有効期限は、<?= $limit ?>となっております。
            </p>
            <p>
            メールをご確認の上、お手続きを完了してください。<br />
            ※URLが届かない方は
            <?= $this->Html->link(
                    'お問い合わせフォーム',
                    D_LINK_QUESTION,
                );?>
            からご連絡ください。
            </p>



        </div>
    </section>
  </div>
</main>
