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
                <div class="col-md-8 form-inline">
                    <?= h($sei) ?>
                    <?= h($mei) ?>
                    <?= $this->Form->hidden("sei",[
                        "value"=>h($sei)
                    ])?>
                    <?= $this->Form->hidden("mei",[
                        "value"=>h($mei)
                    ])?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("氏名(ふりがな)") ?>
                </div>
                <div class="col-md-8 form-inline">
                    <?= h($sei_kana) ?>
                    <?= h($mei_kana) ?>
                    <?= $this->Form->hidden("sei_kana",[
                        "value"=>h($sei_kana)
                    ])?>
                    <?= $this->Form->hidden("mei_kana",[
                        "value"=>h($mei_kana)
                    ])?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("企業名") ?>
                </div>
                <div class="col-md-8">
                    <?= h($company) ?>
                    <?= $this->Form->hidden("company",[
                        "value"=>h($company)
                    ])?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("業種") ?>
                </div>
                <div class="col-md-8">
                    <?= h($array_job[$job]) ?>
                    <?= $this->Form->hidden("job",[
                        "value"=>h($job)
                    ])?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("住所") ?>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12 form-inline">
                            <?= h($post1) ?>-<?= h($post2) ?>
                            <?= $this->Form->hidden("post1",[
                                "value"=>$post1
                            ])?>
                            <?= $this->Form->hidden("post2",[
                                "value"=>$post2
                            ])?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <?= h($array_prefecture[$prefecture]) ?>
                            <?= $this->Form->hidden("prefecture",[
                                "value"=>h($prefecture)
                            ])?>
                            <?= h($city) ?>
                            <?= $this->Form->hidden("city",[
                                "value"=>h($city)
                            ])?>
                            <?= h($space) ?>
                            <?= $this->Form->hidden("space",[
                                "value"=>h($space)
                            ])?>
                            <?= h($build) ?>
                            <?= $this->Form->hidden("build",[
                                "value"=>h($build)
                            ])?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("担当部署") ?>
                </div>
                <div class="col-md-6">
                    <?= h($busyo) ?>
                    <?= $this->Form->hidden("busyo",[
                        "value"=>$busyo
                    ]) ?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("電話番号") ?>
                </div>
                <div class="col-md-9 form-inline ">
                    <?= h($tel1) ?> -
                    <?= h($tel2) ?> -
                    <?= h($tel3) ?>
                    <?= $this->Form->hidden("tel1",[
                        'value'=>$tel1
                    ])?>
                    <?= $this->Form->hidden("tel2",[
                        'value'=>$tel2
                    ])?>
                    <?= $this->Form->hidden("tel3",[
                        'value'=>$tel3
                    ])?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("メールアドレス") ?>
                </div>
                <div class="col-md-9">
                    <?= h($email) ?>
                    <?= $this->Form->hidden("email",[
                        "value"=>$email
                    ])?>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("パスワード") ?>
                </div>
                <div class="col-md-9">
                    ****
                    <?= $this->Form->hidden("password",[
                        "value"=>$password
                    ])?>
                    <?php
                    if (empty($role) || $role != "admin"): ?>
                            <?= $this->Form->hidden("agree",[
                                "value"=>$this->request->getData("agree")
                            ])?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-5">
                <div class="d-flex">
                <?php
                    $button = __("登録");
                    if($id > 0 ) $button = __("更新");
                ?>
                    <div >
                        <?= $this->Form->submit("戻る", [
                            'class' => 'btn btn-secondary text-white',
                            'name'=> 'back'
                        ]) ?>
                    </div>
                    <div class="ml-3">
                        <?= $this->Form->submit($button, [
                            'class' => 'btn btn-warning text-white',
                            'id' => 'regist',
                            'name'=> 'editregist'
                        ]) ?>
                    </div>
                </div>
            </div>


            <?= $this->Form->end(); ?>
        </section>
