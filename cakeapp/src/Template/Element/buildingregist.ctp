<div class="card-deck col-md-12 text-left">
    <div class="card shadow-sm">
        <div class="card-header">
            <p class="my-0 font-weight-normal"><?= __("注意事項") ?></p>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-2"><?= __("物件名称") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if($type == "conf"):?>
                        <?= h($this->request->getData('name')) ?>
                    <?php else: ?>
                        <?= $this->Form->input("name",[
                            "type"=>"text",
                            "class"=>"form-control",
                            "label"=>false,
                            "placeholder"=>__("物件名を入力してください。")
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("所在地") ?></div>
                <div class="col-2">
                    <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <?php if($type == "conf"):?>
                    <div class="col-8 ">
                        <?= h($this->request->getData('post1')) ?>-
                        <?= h($this->request->getData('post2')) ?>
                        <br />
                        <?= h($array_prefecture[$this->request->getData('pref')]) ?>
                        <?= $this->request->getData('city') ?>
                        <?= $this->request->getData('space') ?>
                        <?= $this->request->getData('build') ?>
                    </div>
                <?php else: ?>
                    <div class="col-8 ">
                        <div class="d-flex">
                            <div class="text-nowrap">郵便番号</div>
                            <div class="w-25 ml-2">
                                <?= $this->Form->input("post1",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "maxlength"=>3
                                ]) ?>
                            </div><div class="ml-2">-</div>
                            <div class="w-25 ml-2">
                                <?= $this->Form->input("post2",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "maxlength"=>4,
                                    "onKeyUp"=>"AjaxZip3.zip2addr('post1','post2','prefecture','city','space');"
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label>都道府県</label>
                                <select name="pref" class="form-control"  >
                                <?php foreach($array_prefecture as $key=>$value): ?>
                                    <option value="<?= $key ?>" ><?= $value ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <?= $this->Form->input("city",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>"市区町村",
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <?= $this->Form->input("space",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>"番地",
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <?= $this->Form->input("build",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>"ビル・マンション名",
                                ]) ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("店舗形態") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if($type == "conf"): ?>
                        <?= h($array_shop[$this->request->getData('shop_type')]) ?>
                    <?php else: ?>
                        <select name="shop_type" class="form-control w-75" >
                            <option value="" >-</option>
                            <?php foreach($array_shop as $key=>$value): ?>
                                <option value="<?= $key ?>" ><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("店舗面積") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= number_format($this->request->getData('shop_area')); ?>
                        坪
                    <?php else: ?>
                        <?= $this->Form->input("shop_area",[
                            "type"=>"text",
                            "class"=>"form-control ",
                            "label"=>false,
                        ]) ?>
                        <div class="mt-2 ml-2">坪</div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("契約形態") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= $array_agreement[$this->request->getData('agreement')]; ?>
                    <?php else: ?>
                        <select name="agreement" class="form-control w-75" >
                            <option value="" >-</option>
                            <?php foreach($array_agreement as $key=>$value): ?>
                                <option value="<?= $key ?>" ><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("保証金") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= number_format($this->request->getData('security_money')); ?>円
                    <?php else: ?>
                        <?= $this->Form->input("security_money",[
                            "type"=>"text",
                            "class"=>"form-control ",
                            "label"=>false,
                        ]) ?>
                    <div class="mt-2 ml-2">円</div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("賃料") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= number_format($this->request->getData('rent_money')); ?>円
                    <?php else: ?>
                        <?= $this->Form->input("rent_money",[
                            "type"=>"text",
                            "class"=>"form-control ",
                            "label"=>false,
                        ]) ?>
                        <div class="mt-2 ml-2">円</div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("共益費") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= number_format($this->request->getData('common_money')); ?>円
                    <?php else: ?>
                        <?= $this->Form->input("common_money",[
                            "type"=>"text",
                            "class"=>"form-control ",
                            "label"=>false,
                        ]) ?>
                        <div class="mt-2 ml-2">円</div>
                        <div class="col-12">
                            <small>共益費がない場合は０を入力してください。</small>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("駐車場台数") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= number_format($this->request->getData('parking_count')); ?>台
                    <?php else: ?>
                        <?= $this->Form->input("parking_count",[
                            "type"=>"text",
                            "class"=>"form-control ",
                            "label"=>false,
                        ]) ?>
                        <div class="mt-2 ml-2">台</div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("建物の形態") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= $array_build[$this->request->getData('build_type')]; ?>
                    <?php else: ?>
                        <select name="build_type" class="form-control w-75" >
                            <option value="" >-</option>
                            <?php foreach($array_build as $key=>$value): ?>
                                <option value="<?= $key ?>" ><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("建物の構造") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= $array_constract[$this->request->getData('constract_type')]; ?>
                    <?php else: ?>
                        <select name="constract_type" class="form-control w-75" >
                            <option value="" >-</option>
                            <?php foreach($array_constract as $key=>$value): ?>
                                <option value="<?= $key ?>" ><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2"><?= __("敷地図/<br />平面図") ?></div>
                <div class="col-2">
                    &nbsp;
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>
                        ファイル名
                    <?php else: ?>
                        <p>添付するファイルを選択してください。<br />
                        <span class="text-danger">※登録できるファイルサイズは５MB以下までです。</span></p>
                        <div class="input-group">
                            <label class="input-group-btn">
                                <span class="btn btn-primary">
                                    ファイル選択<input type="file" style="display:none">
                                </span>
                            </label>
                            <input type="text" class="form-control" readonly="">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("備考") ?></div>
                <div class="col-2">
                    &nbsp;
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>
                        <?= nl2br($this->request->getData('other')) ?>
                    <?php else: ?>
                        <?= $this->Form->input("other",[
                            "type"=>"textarea",
                            "class"=>"form-control w-100",
                            "name"=>"other",
                            "label"=>false,
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2"><?= __("掲載期間") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 d-flex">
                    <?php if($type == "conf"): ?>
                        <?= $this->request->getData("start") ?>～
                        <?= $this->request->getData("end") ?>
                    <?php else: ?>
                        <div>
                            <?= $this->Form->input("start",[
                                "type"=>"text",
                                "class"=>"form-control calendar",
                                "name"=>"start",
                                "label"=>false,
                            ]) ?>
                        </div>
                        <div class="mt-2">～</div>
                        <div>
                            <?= $this->Form->input("end",[
                                "type"=>"text",
                                "class"=>"form-control calendar",
                                "name"=>"end",
                                "label"=>false,
                            ]) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2"><?= __("公開設定") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if($type == "conf"): ?>
                        <?= $this->request->getData("open")?>
                    <?php else: ?>
                        <div class="switchbutton" id="makeImg">
                            <input type="checkbox" name="open" id="sample2check" checked="">
                            <label for="sample2check">
                            <div id="sample2box"></div>
                            </label>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4"><?= __("物件紹介メッセージ") ?></div>
                <div class="col-8">
                    <?php if($type == "conf"): ?>
                        <?= nl2br($this->request->getData("message"))?>
                    <?php else: ?>
                        <?= $this->Form->input("message",[
                            "type"=>"textarea",
                            "class"=>"form-control w-100",
                            "name"=>"other",
                            "label"=>false,
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>



            <div class="row mt-3">
                <div class="col-4">
                    <?= $this->Form->input("戻る",[
                        "type"=>"submit",
                        "value"=>"on",
                        "name"=>"back",
                        "class"=>"btn btn-secondary w-100 text-white"
                    ]) ?>
                </div>
                <div class="col-4">
                    <?= $this->Form->input("登録",[
                        "type"=>"submit",
                        "value"=>"on",
                        "name"=>"regist",
                        "class"=>"btn btn-warning w-100 text-white"
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
