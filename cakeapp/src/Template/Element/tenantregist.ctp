<div class="card-deck col-md-12 text-left">
    <div class="card shadow-sm">
        <div class="card-header">
            <p class="my-0 font-weight-normal"><?= __("注意事項") ?></p>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-3"><?= __("テナント名称") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if ($type == "conf"):?>
                        <?= h($this->request->getData('name')) ?>
                    <?php else: ?>
                        <?= $this->Form->input("name",[
                            "type"=>"text",
                            "class"=>"form-control",
                            "label"=>false,
                            "placeholder"=>__("テナント名を入力してください。")
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-3"><?= __("希望地") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if ($type == "conf"): ?>
                        <?= h($array_prefecture[$this->request->getData('pref')]) ?>
                    <?php else: ?>
                        <?= $this->Form->select("pref",$array_prefecture,[
                            "class"=>"form-control ",
                            "label"=>false,
                            "empty"=>"希望地を選択してください。"
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("坪数") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 form-group radio">
                    <?php if ($type == "conf" ): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $array_floor[$this->request->getData('floor')]; ?><br />
                                <?=$this->request->getData("min_floor")?>～
                                <?=$this->request->getData("max_floor")?> 坪
                            </div>
                        </div>
                    <?php else: ?>
                        <?= $this->Form->radio("floor",$array_floor,[
                            "class"=>"form-group",
                            'legend' => false,
                        ]) ?>
                    <div class="row d-flex">
                        <div class="col-md-5">
                            <select name="min_floor" class="form-control">
                            <option value="">選択してください</option>
                            <?php for($i=10;$i<=200;$i+=10): ?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-1 text-center mt-2">～</div>
                        <div class="col-md-5">
                            <select name="max_floor" class="form-control">
                            <option value="">選択してください</option>
                            <?php for($i=200;$i>=10;$i-=10): ?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <small>一坪は訳3.31平米です。</small>
                    <?php endif; ?>

                </div>

            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("賃料") ?></div>
                <div class="col-1">
                    <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                <?php if ($type == "conf"): ?>
                    <?=$this->request->getData("rent_money_min")?>～
                    <?=$this->request->getData("rent_money_max")?>
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-5 input-group">
                            <?= $this->Form->select("rent_money_min", $array_rent_money,[
                                "class"=>"form-control ",
                                "label"=>false,
                                "empty"=>"選択してください",
                            ]) ?><span class=" ml-2 mt-2">円</span>
                        </div>
                        <div class="col-md-1 mt-2">～</div>
                        <div class="col-md-5 input-group">
                            <?php krsort($array_rent_money); ?>
                            <?= $this->Form->select("rent_money_max", $array_rent_money,[
                                "class"=>"form-control",
                                "label"=>false,
                                "empty"=>"選択してください",
                            ]) ?><span class=" ml-2 mt-2">円</span>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("坪単価") ?></div>
                <div class="col-1">
                <span class="badge badge-secondary"><?= __("任意") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if ($type == "conf"): ?>
                        <?=$this->request->getData("space_money_min")?>～
                        <?=$this->request->getData("space_money_max")?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-5 input-group">
                                <?= $this->Form->select("space_money_min", $array_space_money,[
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "empty"=>"選択してください",
                                ]) ?><span class=" ml-2 mt-2">円</span>
                            </div>
                            <div class="col-md-1 mt-2">～</div>
                            <div class="col-md-5 input-group">
                                <?php krsort($array_space_money); ?>
                                <?= $this->Form->select("space_money_max", $array_space_money,[
                                    "class"=>"form-control",
                                    "label"=>false,
                                    "empty"=>"選択してください",
                                ]) ?><span class=" ml-2 mt-2">円</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("業種") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if ($type == "conf" ): ?>
                        <?= $array_job[$this->request->getData('job')]; ?>
                    <?php else: ?>
                        <?= $this->Form->select("job", $array_job,[
                            "class"=>"form-control",
                            "label"=>false,
                            "empty"=>"選択してください",
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("サブカテゴリ") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if ($type == "conf" ): ?>
                        <?= $array_sub[$this->request->getData('sub')]; ?>
                    <?php else: ?>
                        <?= $this->Form->select("sub", $array_sub,[
                            "class"=>"form-control",
                            "label"=>false,
                            "empty"=>"選択してください",
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("業態") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if ($type == "conf" ): ?>
                        <div class="row">
                            <?php
                                $jobtype = $this->request->getData("jobtype");
                                foreach ($jobtype as $key=>$value):
                                foreach ($value as $k=>$val):
                            ?>
                            <div class="col-md-6">
                                <?= h($array_job_type[$key][$k]) ?>
                            </div>
                            <?php
                                endforeach;
                                endforeach;
                            ?>
                        </div>
                    <?php else: ?>
                        <div class="row">
                        <?php foreach ($array_job_type as $key=>$value): ?>
                        <?php foreach ($value as $k=>$val): ?>
                            <div class="col-md-6">
                            <label class="jobtype-<?= $key ?>">
                                <input type="checkbox" name="jobtype[<?= $key ?>][<?= $k ?>]" value="on" />
                                <?=h($val)?>
                            </label>
                            </div>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("掲載期間") ?></div>
                <div class="col-1">
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
                <div class="col-3"><?= __("公開設定") ?></div>
                <div class="col-1">
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
            <?php if($type != "conf"): ?>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="alert-primary text-center" >
                        <label>
                        <input type="checkbox" name="agree" value="on" />
                         規約に同意する</label>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row mt-3">
            <?php if($type == "conf"): ?>
                <div class="col-6">
                    <?= $this->Form->input("修正する",[
                        "type"=>"submit",
                        "value"=>"on",
                        "name"=>"back",
                        "class"=>"btn btn-secondary w-100 text-white"
                    ]) ?>
                </div>
            <?php endif; ?>
                <div class="col-6 mx-auto">
                    <?= $this->Form->input($button,[
                        "type"=>"submit",
                        "value"=>"on",
                        "name"=>$buttonname,
                        "class"=>"btn btn-warning w-100 text-white"
                    ]) ?>
                </div>
            </div>

        </div>
    </div>
</div>
