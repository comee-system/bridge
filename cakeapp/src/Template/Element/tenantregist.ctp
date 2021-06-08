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
                        <?= $this->Form->hidden("name",[
                            "value"=>$this->request->getData('name')
                        ])?>
                    <?php else: ?>
                        <?php
                            $name = "";
                            if($this->request->getData('name') ):
                                $name = $this->request->getData('name');
                            else:
                                if(isset($tenant[ 'name' ])) $name = $tenant[ 'name' ];
                            endif;
                        ?>

                        <?= $this->Form->input("name",[
                            "type"=>"text",
                            "class"=>"form-control",
                            "label"=>false,
                            "maxlength"=>128,
                            "placeholder"=>__("テナント名を入力してください。"),
                            "value"=>$name
                        ]) ?>
                        <?php if(!empty($error[ 'name' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'name' ]["_empty"]) ?></small>
                        <?php endif; ?>
                        <?php if(!empty($error[ 'name' ][ "maxLength" ])): ?>
                        <small class="text-danger"><?= h($error[ 'name' ]["maxLength"]) ?></small>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-3"><?= __("希望地") ?></div>
                <div class="col-1">
                    <span class="badge badge-secondary"><?= __("任意") ?></span>
                </div>
                <div class="col-8">
                    <label>第1希望</label>
                    <?php if ($type == "conf"):?>
                        <?php if(!empty($array_prefecture[$this->request->getData('pref')[1]])):?>
                        <?= h($array_prefecture[$this->request->getData('pref')[1]]) ?>
                        <?php endif; ?>
                        <?= $this->Form->hidden("pref[1]",[
                            "value"=>$this->request->getData("pref")[1]
                        ])?>
                        <br />
                    <?php else: ?>
                        <?php
                            $prefs = (!empty($tenant['prefs']))?explode(",",$tenant['prefs']):[];
                            $pref1 = ($this->request->getData("pref")[1])?$this->request->getData("pref")[1]:(!empty($prefs[0]))?$prefs[0]:"";
                            $pref2 = ($this->request->getData("pref")[2])?$this->request->getData("pref")[2]:(!empty($prefs[1]))?$prefs[1]:"";
                            $pref3 = ($this->request->getData("pref")[2])?$this->request->getData("pref")[3]:(!empty($prefs[2]))?$prefs[2]:"";
                        ?>

                        <?= $this->Form->select("pref[1]",$array_prefecture,[
                            "class" => "form-control",
                            "empty" => "-",
                            "default"=>$pref1
                        ]) ?>
                    <?php endif; ?>
                    <label class="mt-3">第2希望</label>
                    <?php if ($type == "conf"):?>
                        <?php if(!empty($array_prefecture[$this->request->getData('pref')[2]])):?>
                        <?= h($array_prefecture[$this->request->getData('pref')[2]]) ?>
                        <?php endif; ?>
                        <?= $this->Form->hidden("pref[2]",[
                            "value"=>$this->request->getData("pref")[2]
                        ])?>
                        <br />
                    <?php else: ?>
                        <?= $this->Form->select("pref[2]",$array_prefecture,[
                            "class" => "form-control",
                            "empty" => "-",
                            "default"=>$pref2
                        ]) ?>
                    <?php endif; ?>

                    <label class="mt-3">第3希望</label>
                    <?php if ($type == "conf"):?>
                        <?php if(!empty($array_prefecture[$this->request->getData('pref')[3]])):?>
                        <?= h($array_prefecture[$this->request->getData('pref')[3]]) ?>
                        <?php endif; ?>
                        <?= $this->Form->hidden("pref[3]",[
                            "value"=>$this->request->getData("pref")[3]
                        ])?>
                        <br />
                    <?php else: ?>
                        <?= $this->Form->select("pref[3]",$array_prefecture,[
                            "class" => "form-control",
                            "empty" => "-",
                            "default"=>$pref3
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
                            <?= $this->Form->hidden("floor",[
                                "value"=>$this->request->getData('floor')
                            ])?>
                            <?= $this->Form->hidden("min_floor",[
                                "value"=>$this->request->getData('min_floor')
                            ])?>
                            <?= $this->Form->hidden("max_floor",[
                                "value"=>$this->request->getData('max_floor')
                            ])?>
                        </div>
                    <?php else: ?>

                        <?php
                            $floor = "";
                            if($this->request->getData('floor') ):
                                $floor = $this->request->getData('floor');
                            else:
                                if(isset($tenant[ 'floor' ])) $floor = $tenant[ 'floor' ];
                            endif;
                        ?>
                        <?= $this->Form->radio("floor",$array_floor,[
                            "class"=>"form-group",
                            'legend' => false,
                            'default'=>$floor
                        ]) ?>
                    <div class="row d-flex">
                        <div class="col-md-5">
                            <div class="d-flex">
                            <?= $this->Form->number("min_floor",[
                                "class"=>"form-control",
                                "label"=>false,
                                "value"=>($this->request->getData("min_floor"))?$this->request->getData("min_floor"):(!empty($tenant[ 'min_floor' ]))?$tenant[ 'min_floor' ]:""
                            ]) ?>
                            <span class="mt-3 ml-2">坪</span>
                            </div>
                        </div>
                        <div class="col-md-1 text-center mt-2">～</div>
                        <div class="col-md-5">
                            <div class="d-flex">
                                <?= $this->Form->number("max_floor",[
                                    "class"=>"form-control",
                                    "label"=>false,
                                    "value"=>($this->request->getData("max_floor"))?$this->request->getData("max_floor"):(!empty($tenant[ 'max_floor' ]))?$tenant[ 'max_floor' ]:""
                                ]) ?>
                            <span class="mt-3 ml-2">坪</span>
                            </div>
                        </div>
                    </div>
                    <small>一坪は訳3.31平米です。</small>
                        <?php if(!empty($error[ 'floor' ][ "_empty" ])): ?>
                            <br /><small class="text-danger"><?= h($error[ 'floor' ]["_empty"]) ?></small>
                        <?php endif; ?>
                        <?php if(!empty($error[ 'max_floor' ][ "min_floor" ])): ?>
                            <br /><small class="text-danger"><?= h($error[ 'max_floor' ]["min_floor"]) ?></small>
                        <?php endif; ?>

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
                    <?= h(number_format($this->request->getData("rent_money_min"))) ?>円～
                    <?= h(number_format($this->request->getData("rent_money_max"))) ?>円
                    <?= $this->Form->hidden("rent_money_min",[
                        "value"=>$this->request->getData('rent_money_min')
                    ])?>
                    <?= $this->Form->hidden("rent_money_max",[
                        "value"=>$this->request->getData('rent_money_max')
                    ])?>
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-5 ">
                        <?php
                            $rent_money_min = "";
                            if($this->request->getData( 'rent_money_min' )){
                                $rent_money_min = $this->request->getData("rent_money_min");
                            } else {
                                if(isset($tenant[ 'rent_money_min' ]) && $tenant[ 'rent_money_min' ]) $rent_money_min = $tenant["rent_money_min"];
                            }
                        ?>
                            <div class="d-flex">
                                <?= $this->Form->number("rent_money_min",[
                                    "class"=>"form-control w-75",
                                    "label"=>false,
                                    "value"=>$rent_money_min
                                ]) ?>
                                <span class=" ml-2 mt-2">円</span>
                            </div>
                        </div>
                        <div class="col-md-1 mt-2">～</div>
                        <div class="col-md-5">

                            <?php
                                $rent_money_max = "";
                                if($this->request->getData( 'rent_money_max' )){
                                    $rent_money_max = $this->request->getData("rent_money_max");
                                } else {
                                    if(isset($tenant[ 'rent_money_max' ]) && $tenant[ 'rent_money_max' ]) $rent_money_max = $tenant["rent_money_max"];
                                }
                            ?>

                            <div class="d-flex">
                                <?= $this->Form->number("rent_money_max",[
                                    "class"=>"form-control w-75",
                                    "label"=>false,
                                    "value"=>$rent_money_max
                                ]) ?>
                                <span class=" ml-2 mt-2">円</span>
                            </div>

                        </div>
                        <?php if(!empty($error[ 'rent_money_min' ][ "_empty" ])): ?>
                            <br /><small class="text-danger"><?= h($error[ 'rent_money_min' ]["_empty"]) ?></small>
                        <?php endif; ?>
                        <?php if(!empty($error[ 'rent_money_max' ][ "_empty" ])): ?>
                            <br /><small class="text-danger"><?= h($error[ 'rent_money_max' ]["_empty"]) ?></small>
                        <?php endif; ?>
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
                        <?=number_format($this->request->getData("space_money_min"))?> 円～
                        <?=number_format($this->request->getData("space_money_max"))?> 円
                        <?= $this->Form->hidden("space_money_max",[
                            "value"=>$this->request->getData('space_money_max')
                        ])?>
                        <?= $this->Form->hidden("space_money_min",[
                            "value"=>$this->request->getData('space_money_min')
                        ])?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-5 input-group">
                                <?php
                                    $space_money_min = "";
                                    if($this->request->getData( 'space_money_min' )){
                                        $space_money_min = $this->request->getData("space_money_min");
                                    } else {
                                        if(isset($tenant[ 'space_money_min' ]) && $tenant[ 'space_money_min' ]) $space_money_min = $tenant["space_money_min"];
                                    }
                                ?>

                                <div class="d-flex">
                                    <?= $this->Form->number("space_money_min",[
                                        "class"=>"form-control w-75",
                                        "label"=>false,
                                        "value"=>$space_money_min
                                    ]) ?>
                                    <span class=" ml-2 mt-2">円</span>
                                </div>

                            </div>
                            <div class="col-md-1 mt-2">～</div>
                            <div class="col-md-5 input-group">
                                <?php
                                    $space_money_max = "";
                                    if($this->request->getData( 'space_money_max' )){
                                        $space_money_max = $this->request->getData("space_money_max");
                                    } else {
                                        if(isset($tenant[ 'space_money_max' ]) && $tenant[ 'space_money_max' ]) $space_money_max = $tenant["space_money_max"];
                                    }
                                ?>


                                <div class="d-flex">
                                    <?= $this->Form->number("space_money_max",[
                                        "class"=>"form-control w-75",
                                        "label"=>false,
                                        "value"=>$space_money_max
                                    ]) ?>
                                    <span class=" ml-2 mt-2">円</span>
                                </div>

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
                        <?= $this->Form->hidden("job",[
                            "value"=>$this->request->getData('job')
                        ])?>
                    <?php else: ?>
                        <?php
                            $job = "";
                            if($this->request->getData( 'job' )){
                                $job = $this->request->getData("job");
                            } else {
                                if(isset($tenant[ 'job' ]) && $tenant[ 'job' ]) $job = $tenant["job"];
                            }
                        ?>
                        <?= $this->Form->select("job", $array_job,[
                            "class"=>"form-control",
                            "label"=>false,
                            "empty"=>"選択してください",
                            "default"=>$job
                        ]) ?>
                    <?php endif; ?>
                    <?php if(!empty($error[ 'job' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'job' ]["_empty"]) ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("その他要望事項") ?></div>
                <div class="col-1">
                <span class="badge badge-secondary"><?= __("任意") ?></span>
                </div>
                <div class="col-8 ">
                <?php if($type == "conf"): ?>
                    <?= nl2br(h($this->request->getData("other"))) ?>
                    <?= $this->Form->hidden("other",[
                        'value'=>$this->request->getData("other")
                    ])?>
                <?php else: ?>
                    <?php
                        $other = "";
                        if($this->request->getData( 'other' )){
                            $other = $this->request->getData("other");
                        } else {
                            if(isset($tenant[ 'other' ]) && $tenant[ 'other' ]) $other = $tenant["other"];
                        }
                    ?>
                    <?= $this->Form->textarea("other",[
                        "class"=>"form-control w-100",
                        "value"=>$other
                    ])?>
                <?php endif;?>
                </div>
            </div>
            <?php if(isset($role) && $role == "admin"): ?>



                <?= $this->Form->hidden("agree",[
                    "value"=>1
                ])?>
            <?php else: ?>
                <?php if($type == "conf"): ?>
                    <?= $this->Form->hidden("agree",[
                        "value"=>$this->request->getData('agree')
                    ])?>
                <?php else: ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="alert-primary text-center" >
                            <label>
                            <input type="checkbox" name="agree" value="on" />
                            テナント<a href="#" target=_blank>登録規約</a>に同意する</label>
                        </div>
                        <?php if(!empty($error[ "agree" ][ "_required" ])): ?>
                            <small class="text-danger"><?= h($error[ "agree" ]["_required"]) ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
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
