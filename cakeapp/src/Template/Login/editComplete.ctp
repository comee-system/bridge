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


            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">パスワード再設定完了</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>パスワード再設定が完了しました。</li>
                        <li>ログイン画面よりログインしてください</li>
                    </ul>
                    <p>

                    <a href="/login" class="btn btn-lg btn-block btn-outline-warning">ログイン画面へ</a>
                </div>
            </div>



        </div>
    </section>
  </div>
</main>
