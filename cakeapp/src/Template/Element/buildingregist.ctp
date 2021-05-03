<div class="card-deck col-md-12 text-left w-100">
    <div class="card shadow-sm ">
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
                        <?= $this->Form->hidden("name",[
                                "value"=>$this->request->getData('name')
                        ])?>
                    <?php else: ?>
                        <?= $this->Form->input("name",[
                            "type"=>"text",
                            "class"=>"form-control",
                            "label"=>false,
                            "placeholder"=>__("物件名を入力してください。")
                        ]) ?>
                    <?php endif; ?>
                    <?php if(!empty($error[ "name" ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ "name" ]["_empty"]) ?></small>
                    <?php endif; ?>
                    <?php if(!empty($error[ 'name' ][ "maxLength" ])): ?>
                        <small class="text-danger"><?= h($error[ 'name' ]["maxLength"]) ?></small>
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
                        <?= $this->Form->hidden("post1",[
                                "value"=>$this->request->getData('post1')
                        ])?>
                        <?= $this->Form->hidden("post2",[
                                "value"=>$this->request->getData('post2')
                        ])?>
                        <?= $this->Form->hidden("pref",[
                                "value"=>$this->request->getData('pref')
                        ])?>
                        <?= $this->Form->hidden("city",[
                                "value"=>$this->request->getData('city')
                        ])?>
                        <?= $this->Form->hidden("space",[
                                "value"=>$this->request->getData('space')
                        ])?>
                        <?= $this->Form->hidden("build",[
                                "value"=>$this->request->getData('build')
                        ])?>
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
                                    "onKeyUp"=>"AjaxZip3.zip2addr('post1','post2','pref','city','space');"
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label>都道府県</label>
                                <?= $this->Form->select("pref", $array_prefecture,[
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "empty"=>"選択してください",
                                ]) ?>
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

                        <?php if(!empty($error[ 'post1' ][ "_empty" ])): ?>
                            <small class="text-danger"><?= h($error[ 'post1' ]["_empty"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'post2' ][ "_empty" ])): ?>
                            <small class="text-danger"><?= h($error[ 'post2' ]["_empty"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'post1' ][ "integer" ])): ?>
                            <small class="text-danger"><?= h($error[ 'post1' ]["integer"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'post2' ][ "integer" ])): ?>
                            <small class="text-danger"><?= h($error[ 'post2' ]["integer"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'city' ][ "_empty" ])): ?>
                            <small class="text-danger"><?= h($error[ 'city' ]["_empty"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'city' ][ "maxLength" ])): ?>
                            <small class="text-danger"><?= h($error[ 'city' ]["maxLength"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'space' ][ "_empty" ])): ?>
                            <small class="text-danger"><?= h($error[ 'space' ]["_empty"]) ?></small><br />
                        <?php endif; ?>
                        <?php if(!empty($error[ 'space' ][ "maxLength" ])): ?>
                            <small class="text-danger"><?= h($error[ 'space' ]["maxLength"]) ?></small><br />
                        <?php endif; ?>

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
                        <?= $this->Form->hidden("shop_type",[
                                "value"=>$this->request->getData('shop_type')
                        ])?>
                    <?php else: ?>
                        <?= $this->Form->select("shop_type", $array_shop,[
                            "class"=>"form-control ",
                            "label"=>false,
                            "empty"=>"選択してください",
                        ]) ?>
                    <?php endif; ?>
                    <?php if(!empty($error[ 'shop_type' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'shop_type' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'shop_type' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'shop_type' ]["integer"]) ?></small><br />
                    <?php endif; ?>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("店舗面積") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('shop_area')); ?>
                            坪
                            <?= $this->Form->hidden("shop_area",[
                                    "value"=>$this->request->getData('shop_area')
                            ])?>
                        <?php else: ?>
                            <?= $this->Form->input("shop_area",[
                                "type"=>"text",
                                "class"=>"form-control ",
                                "label"=>false,
                            ]) ?>
                            <div class="mt-2 ml-2">坪</div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($error[ 'shop_area' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'shop_area' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'shop_area' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'shop_area' ]["integer"]) ?></small><br />
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
                        <?= $this->Form->hidden("agreement",[
                                "value"=>$this->request->getData('agreement')
                        ])?>
                    <?php else: ?>
                        <?= $this->Form->select("agreement", $array_agreement,[
                            "class"=>"form-control ",
                            "label"=>false,
                            "empty"=>"選択してください",
                        ]) ?>
                    <?php endif; ?>
                    <?php if(!empty($error[ 'agreement' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'agreement' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'agreement' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'agreement' ]["integer"]) ?></small><br />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("保証金") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('security_money')); ?>円
                            <?= $this->Form->hidden("security_money",[
                                    "value"=>$this->request->getData('security_money')
                            ])?>
                        <?php else: ?>
                            <?= $this->Form->input("security_money",[
                                "type"=>"text",
                                "class"=>"form-control ",
                                "label"=>false,
                            ]) ?>
                        <div class="mt-2 ml-2">円</div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($error[ 'security_money' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'security_money' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'security_money' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'security_money' ]["integer"]) ?></small><br />
                    <?php endif; ?>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("賃料") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('rent_money')); ?>円
                            <?= $this->Form->hidden("rent_money",[
                                    "value"=>$this->request->getData('rent_money')
                            ])?>
                        <?php else: ?>
                            <?= $this->Form->input("rent_money",[
                                "type"=>"text",
                                "class"=>"form-control ",
                                "label"=>false,
                            ]) ?>
                            <div class="mt-2 ml-2">円</div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($error[ 'rent_money' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'rent_money' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'rent_money' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'rent_money' ]["integer"]) ?></small><br />
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
                        <?= $this->Form->hidden("common_money",[
                                "value"=>$this->request->getData('common_money')
                        ])?>
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
                    <?php if(!empty($error[ 'common_money' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'common_money' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'common_money' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'common_money' ]["integer"]) ?></small><br />
                    <?php endif; ?>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("駐車場台数") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('parking_count')); ?>台
                            <?= $this->Form->hidden("parking_count",[
                                    "value"=>$this->request->getData('parking_count')
                            ])?>
                        <?php else: ?>
                            <?= $this->Form->input("parking_count",[
                                "type"=>"text",
                                "class"=>"form-control ",
                                "label"=>false,
                            ]) ?>
                            <div class="mt-2 ml-2">台</div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($error[ 'parking_count' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'parking_count' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'parking_count' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'parking_count' ]["integer"]) ?></small><br />
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("建物の形態") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>
                        <?= $array_build[$this->request->getData('build_type')]; ?>
                        <?= $this->Form->hidden("build_type",[
                                "value"=>$this->request->getData('build_type')
                        ])?>
                    <?php else: ?>
                        <?= $this->Form->select("build_type", $array_build,[
                            "class"=>"form-control ",
                            "label"=>false,
                            "empty"=>"選択してください",
                        ]) ?>
                    <?php endif; ?>

                    <?php if(!empty($error[ 'build_type' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'build_type' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'build_type' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'build_type' ]["integer"]) ?></small><br />
                    <?php endif; ?>

                </div>
            </div>
            <div class="row mt-2">
                <div class="col-2"><?= __("建物の構造") ?></div>
                <div class="col-2">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>
                        <?= $array_constract[$this->request->getData('constract_type')]; ?>
                        <?= $this->Form->hidden("constract_type",[
                                "value"=>$this->request->getData('constract_type')
                        ])?>
                    <?php else: ?>
                        <?= $this->Form->select("constract_type", $array_constract,[
                            "class"=>"form-control ",
                            "label"=>false,
                            "empty"=>"選択してください",
                        ]) ?>
                    <?php endif; ?>

                    <?php if(!empty($error[ 'constract_type' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'constract_type' ]["_empty"]) ?></small><br />
                    <?php endif; ?>
                    <?php if(!empty($error[ 'constract_type' ][ "integer" ])): ?>
                        <small class="text-danger"><?= h($error[ 'constract_type' ]["integer"]) ?></small><br />
                    <?php endif; ?>

                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2"><?= __("敷地図/<br />平面図") ?></div>
                <div class="col-2">
                    &nbsp;
                </div>
                <div class="col-8 ">
                    <?php
                    if($type == "conf" ): ?>
                        ファイル名<p><?= $this->request->getData("fileupload.name") ?></p>
                        <?= $this->Form->hidden("uploadfile",[
                                "value"=>$uploadfile
                        ])?>
                        <?= $this->Form->hidden("uploadfilename",[
                                "value"=>$this->request->getData("fileupload.name")
                        ])?>
                    <?php else: ?>
                        <p>添付するファイルを選択してください。<br />
                        <span class="text-danger">※登録できるファイルサイズは５MB以下までです。</span></p>
                        <div class="input-group">
                            <input type="file" name="fileupload" value="" />
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
                        <?= $this->Form->hidden("other",[
                                "value"=>$this->request->getData('other')
                        ])?>
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
                <div class="col-8">
                    <div class="d-flex">
                        <?php if($type == "conf"): ?>
                            <?= $this->request->getData("start") ?>～
                            <?= $this->request->getData("end") ?>
                            <?= $this->Form->hidden("start",[
                                    "value"=>$this->request->getData('start')
                            ])?>
                            <?= $this->Form->hidden("end",[
                                    "value"=>$this->request->getData('end')
                            ])?>
                        <?php else: ?>
                            <div>
                                <?= $this->Form->input("start",[
                                    "type"=>"text",
                                    "class"=>"form-control calendar",
                                    "name"=>"start",
                                    "label"=>false,
                                    "placeholder"=>"未入力は指定なしとする",
                                ]) ?>
                            </div>
                            <div class="mt-2">～</div>
                            <div>
                                <?= $this->Form->input("end",[
                                    "type"=>"text",
                                    "class"=>"form-control calendar",
                                    "name"=>"end",
                                    "label"=>false,
                                    "placeholder"=>"未入力は指定なしとする",
                                ]) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($error[ "start" ][ "end" ])): ?>
                        <small class="text-danger"><?= h($error[ "start" ]["end"]) ?></small>
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
                        <?= h($array_open[$this->request->getData("open")]) ?>
                        <?= $this->Form->hidden("open",[
                                "value"=>$this->request->getData('open')
                        ])?>
                    <?php else: ?>
                        <div class="switchbutton" id="makeImg">
                            <?= $this->Form->checkbox("open",[
                                "id"=>"sample2check",
                                "value"=>1
                            ])?>
                            <label for="sample2check">
                            <div id="sample2box"></div>
                            </label>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($admin): ?>
                <div class="row mt-2">
                    <div class="col-4"><?= __("物件紹介メッセージ") ?></div>
                    <div class="col-8">
                        <?php if($type == "conf"): ?>
                            <?= nl2br($this->request->getData("message"))?>
                            <?= $this->Form->hidden("message",[
                                    "value"=>$this->request->getData('message')
                            ])?>
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
            <?php endif; ?>


            <div class="row mt-3">
                <?php if($type == "conf"): ?>
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
                <?php else: ?>
                    <div class="col-4 mx-auto">
                        <?= $this->Form->input("確認",[
                            "type"=>"submit",
                            "value"=>"on",
                            "name"=>"conf",
                            "class"=>"btn btn-warning w-100 text-white"
                        ]) ?>
                    </div>

                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
