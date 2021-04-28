<?php
$this->Html->addCrumb('会員登録', '');
?>
<?= $this->element('breadcrumbs') ?>
<main>
    <div class="container">
        <div class="alert alert-dark" role="alert">
            <h5><?= __("会員登録") ?></h5>
        </div>
        <?= $this->Flash->render() ?>

        <section class="mb-5">
            <?= $this->Form->create(null, [
                'type' => 'post',
                'url' => [
                    'controller' => 'users',
                    'action' => $actionkey
                ]
            ]) ?>
            <div class="row col-md-10">
                <div class="col-md-2"><?= __("氏名") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("姓") ?>　</label>
                    <input type="text" name="sei" value="<?= $user->sei ?>" class="form-control buttoncheck" placeholder="姓を入力してください" />
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("名") ?>　</label>
                    <input type="text" name="mei" value="<?= $user->mei ?>" class="form-control buttoncheck" placeholder="名を入力してください" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("氏名(ふりがな)") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("せい") ?>　</label>
                    <input type="text" name="sei_kana" value="<?= $user->sei_kana ?>" class="form-control buttoncheck" placeholder="せいを入力してください" />
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("めい") ?>　</label>
                    <input type="text" name="mei_kana" value="<?= $user->mei_kana ?>" class="form-control buttoncheck" placeholder="めいを入力してください" />

                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("企業名") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="company" value="<?= $user->company ?>" class="form-control buttoncheck" placeholder="企業名を入力してください" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("業種") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-7">
                    <select class="form-control buttoncheck" name="job">
                        <option value="<?= $user->job ?>"><?= __("業種を選択してください。") ?></option>
                        <?php foreach ($array_job as $key => $value) :  ?>
                            <?php $selected = "";
                            if ($this->request->is(['post'])) :
                                if ($key == $this->request->getData("job")) :
                                    $selected = "selected";
                                endif;
                            else :
                                if ($key === $user->job) :
                                    $selected = "selected";
                                endif;
                            endif;
                            ?>
                            <option value="<?= h($key) ?>" <?= $selected ?>><?= h($value) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("住所") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9 ">
                    <div class="row">
                        <div class="col-md-12 form-inline">
                            <label><?= __("郵便番号") ?></label>

                            <input type="text" name="post1" value="<?= $post1 ?>" class="form-control buttoncheck" size=3 maxlength=3 placeholder="000" />
                            　-　
                            <input type="text" name="post2" value="<?= $post2 ?>" class="form-control buttoncheck" size=4 maxlength=4 placeholder="0000" onKeyUp="AjaxZip3.zip2addr('post1','post2','prefecture','city','city');" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2"><?= __("都道府県") ?>
                            <select class="form-control buttoncheck" name="prefecture">
                                <option value=""><?= __("都道府県を選択してください") ?></option>
                                <?php foreach ($array_prefecture as $key => $value) :  ?>
                                    <?php $selected = "";
                                    if ($key == $this->request->getData("prefecture"))
                                        $selected = "selected";
                                    ?>
                                    <option value="<?= h($key) ?>" <?= $selected ?>><?= h($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2"><?= __("市区町村") ?>
                            <input type="text" name="city" value="<?= $user->city ?>" class="form-control buttoncheck" placeholder="市区町村を入力してください" />
                        </div>
                        <div class="col-md-12 mt-2"><?= __("番地") ?>
                            <input type="text" name="space" value="<?= $user->space ?>" class="form-control buttoncheck" placeholder="番地を入力してください" />
                        </div>
                        <div class="col-md-12 mt-2"><?= __("ビル・マンション名") ?>
                            <input type="text" name="build" value="<?= $user->build ?>" class="form-control buttoncheck" placeholder="ビル・マンション名を入力してください" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("担当部署") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="busyo" value="<?= $user->busyo ?>" class="form-control buttoncheck" placeholder="担当部署を入力してください" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("電話番号") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9 form-inline ">
                    <input type="text" name="tel1" value="<?= $user->tel1 ?>" size=3 maxlength=3 class="form-control buttoncheck" placeholder="000" />　-　
                    <input type="text" name="tel2" value="<?= $user->tel2 ?>" size=4 maxlength=4 class="form-control buttoncheck" placeholder="0000" />　-　
                    <input type="text" name="tel3" value="<?= $user->tel3 ?>" size=4 maxlength=4 class="form-control buttoncheck" placeholder="0000" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("メールアドレス") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9">
                    <input type="text" name="email" value="<?= $user->email ?>" class="form-control buttoncheck" placeholder="メールアドレスを入力してください" />
                    <div class="alert alert-secondary text-left col-md-12 mt-3" role="alert">
                        受信拒否をしている場合、本人登録用のURLが届かないため、<br />（info@coa-bridge.jp）からの受信ができるように設定してください。
                    </div>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("パスワード") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9">
                    <input type="password" name="password" value="<?= $password ?>" class="form-control buttoncheck" placeholder="パスワードを入力してください" />
                    <div class="alert alert-secondary col-md-12 mt-3" role="alert">
                        <p class="text-left"><?= __("下記の条件でパスワードを作成してください。") ?></p>
                        <ul class="text-left">
                            <li><?= __("8文字以上") ?></li>
                            <li><?= __("半角英数を含む") ?></li>
                            <li><?= __("半角英字を含む") ?></li>
                        </ul>
                    </div>
                    <div class="alert alert-danger col-md-12 form-control text-center" role="alert">
                        <input type="checkbox" name="agree">
                        <a href="http//google.com" target=_blank class="alert-link ">登録時の規約</a>
                        に同意する
                    </div>
                    <div class="text-center">
                        <?= $this->Form->submit("登録する", [
                            'class' => 'btn btn-warning text-white', 'disabled' => 'disabled', 'id' => 'regist'
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $this->Form->end(); ?>
        </section>
    </div><!-- /.container -->

</main>