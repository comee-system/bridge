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
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if ($type == "conf"): ?>
                        <div class="row">
                        <?php foreach($this->request->getData("pref") as $key=>$value): ?>
                            <div class="col-3"><?= h($array_prefecture[$key]) ?></div>
                            <?= $this->Form->hidden("pref[".$key."]",[
                                "value"=>$value
                            ])?>
                        <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="row">
                        <?php
                        foreach($array_prefecture as $key=>$value): ?>
                            <div class="col-md-3">
                            <?php
                                $chk = "";
                                if( isset($this->request->getData("pref")[$key]) && $this->request->getData("pref")[$key] > 0) :
                                    $chk = "checked";
                                else:
                                    if(!empty($prefs) && in_array($key,$prefs)){
                                        $chk = "checked";
                                    }
                                endif;
                            ?>
                            <?= $this->Form->control("pref[".$key."]",[
                                "type"=>"checkbox",
                                "label"=> $value,
                                "hiddenField"=>false,
                                "checked"=>$chk
                            ]) ?>
                            </div>
                        <?php endforeach;?>
                        <?php if(!empty($error_hope[ 'pref' ][ "_required" ])): ?>
                        <small class="text-danger"><?= h($error_hope[ 'pref' ]["_required"]) ?></small>
                        <?php endif; ?>
                        </div>

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
                            <select name="min_floor" class="form-control">
                            <option value="1">未制限</option>
                            <?php for($i=10;$i<=200;$i+=10):
                                $sel = "";
                                if($this->request->getData( 'min_floor' )){
                                    if($this->request->getData("min_floor") == $i) $sel = "selected";
                                } else {
                                    if(isset($tenant[ 'min_floor' ]) && $tenant[ 'min_floor' ] == $i ) $sel = "selected";
                                }
                            ?>

                                <option value="<?=$i?>" <?= $sel ?>><?=$i?></option>
                            <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-1 text-center mt-2">～</div>
                        <div class="col-md-5">
                            <select name="max_floor" class="form-control">
                            <option value="999">未制限</option>
                            <?php for($i=200;$i>=10;$i-=10):
                                $sel = "";
                                if($this->request->getData( 'max_floor' )){
                                    if($this->request->getData("max_floor") == $i) $sel = "selected";
                                } else {
                                    if(isset($tenant[ 'max_floor' ]) && $tenant[ 'max_floor' ] == $i ) $sel = "selected";
                                }
                            ?>
                                <option value="<?=$i?>" <?= $sel ?> ><?=$i?></option>
                            <?php endfor; ?>
                            </select>
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
                    <?= h($array_rent_money[$this->request->getData("rent_money_min")]) ?>円～
                    <?= h($array_rent_money[$this->request->getData("rent_money_max")]) ?>円
                    <?= $this->Form->hidden("rent_money_min",[
                        "value"=>$this->request->getData('rent_money_min')
                    ])?>
                    <?= $this->Form->hidden("rent_money_max",[
                        "value"=>$this->request->getData('rent_money_max')
                    ])?>
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-5 input-group">
                        <?php
                            $rent_money_min = "";
                            if($this->request->getData( 'rent_money_min' )){
                                $rent_money_min = $this->request->getData("rent_money_min");
                            } else {
                                if(isset($tenant[ 'rent_money_min' ]) && $tenant[ 'rent_money_min' ]) $rent_money_min = $tenant["rent_money_min"];
                            }
                        ?>

                            <?= $this->Form->select("rent_money_min", $array_rent_money,[
                                "class"=>"form-control ",
                                "label"=>false,
                                "empty"=>"選択してください",
                                "default"=>$rent_money_min
                            ]) ?><span class=" ml-2 mt-2">円</span>
                        </div>
                        <div class="col-md-1 mt-2">～</div>
                        <div class="col-md-5 input-group">
                            <?php krsort($array_rent_money); ?>
                            <?php
                                $rent_money_max = "";
                                if($this->request->getData( 'rent_money_max' )){
                                    $rent_money_max = $this->request->getData("rent_money_max");
                                } else {
                                    if(isset($tenant[ 'rent_money_max' ]) && $tenant[ 'rent_money_max' ]) $rent_money_max = $tenant["rent_money_max"];
                                }
                            ?>
                            <?= $this->Form->select("rent_money_max", $array_rent_money,[
                                "class"=>"form-control",
                                "label"=>false,
                                "empty"=>"選択してください",
                                "default"=>$rent_money_max
                            ]) ?><span class=" ml-2 mt-2">円</span>
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
                        <?=$this->request->getData("space_money_min")?>～
                        <?=$this->request->getData("space_money_max")?>
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
                                <?= $this->Form->select("space_money_min", $array_space_money,[
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "empty"=>"選択してください",
                                    "default"=>$space_money_min
                                ]) ?><span class=" ml-2 mt-2">円</span>
                            </div>
                            <div class="col-md-1 mt-2">～</div>
                            <div class="col-md-5 input-group">
                                <?php krsort($array_space_money); ?>
                                <?php
                                    $space_money_max = "";
                                    if($this->request->getData( 'space_money_max' )){
                                        $space_money_max = $this->request->getData("space_money_max");
                                    } else {
                                        if(isset($tenant[ 'space_money_max' ]) && $tenant[ 'space_money_max' ]) $space_money_max = $tenant["space_money_max"];
                                    }
                                ?>
                                <?= $this->Form->select("space_money_max", $array_space_money,[
                                    "class"=>"form-control",
                                    "label"=>false,
                                    "empty"=>"選択してください",
                                    "default"=>$space_money_max
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
                <div class="col-3"><?= __("サブカテゴリ") ?></div>
                <div class="col-1">
                <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if ($type == "conf" ): ?>
                        <?= $array_sub[$this->request->getData('sub')]; ?>
                        <?= $this->Form->hidden("sub",[
                            "value"=>$this->request->getData('sub')
                        ])?>
                    <?php else: ?>
                        <?php
                            $sub = "";
                            if($this->request->getData( 'sub' )){
                                $sub = $this->request->getData("sub");
                            } else {
                                if(isset($tenant[ 'sub' ]) && $tenant[ 'sub' ]) $sub = $tenant["sub"];
                            }
                        ?>
                        <?= $this->Form->select("sub", $array_sub,[
                            "class"=>"form-control",
                            "label"=>false,
                            "empty"=>"選択してください",
                            "default"=>$sub
                        ]) ?>
                    <?php endif; ?>
                    <?php if(!empty($error[ 'sub' ][ "_empty" ])): ?>
                        <small class="text-danger"><?= h($error[ 'sub' ]["_empty"]) ?></small>
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
                            <?= $this->Form->hidden("jobtype[".$key."][".$k."]",[
                                "value"=>"on"
                            ])?>
                            <?php
                                endforeach;
                                endforeach;
                            ?>
                        </div>
                    <?php else: ?>
                        <div class="row">
                        <?php foreach ($array_job_type as $key=>$value): ?>
                        <?php foreach ($value as $k=>$val):
                                $chk = "";
                                if($this->request->getData("jobtype")){
                                    $jobtype = $this->request->getData("jobtype");
                                    if(!empty($jobtype[$key][$k])) $chk = "checked";
                                }else{
                                    if(!empty($jobtypes) && in_array($k,$jobtypes)){
                                        $chk = "checked";
                                    }
                                }
                            ?>
                            <div class="col-md-6">
                            <label class="jobtype-<?= $key ?>">
                                <input type="checkbox" <?=$chk?> name="jobtype[<?= $key ?>][<?= $k ?>]" value="on" />
                                <?=h($val)?>
                            </label>
                            </div>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                        </div>
                        <?php if(!empty($error_job[ "jobtype" ][ "_required" ])): ?>
                            <small class="text-danger"><?= h($error_job[ "jobtype" ]["_required"]) ?></small>
                        <?php endif; ?>


                    <?php endif; ?>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-3"><?= __("掲載期間") ?></div>
                <div class="col-1">
                    <span class="badge badge-danger"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
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
                        <?php
                            $start = "";
                            if($this->request->getData( 'start' )){
                                $start = $this->request->getData("start");
                            } else {
                                if(isset($tenant[ 'start' ]) && $tenant[ 'start' ]) $start = date("Y/m/d",strtotime($tenant["start"]));
                            }
                            $end = "";
                            if($this->request->getData( 'end' )){
                                $end = $this->request->getData("end");
                            } else {
                                if(isset($tenant[ 'end' ]) && $tenant[ 'end' ]) $end = date("Y/m/d",strtotime($tenant["end"]));
                            }
                        ?>
                        <div class="d-flex">
                            <div>
                                <?= $this->Form->input("start",[
                                    "type"=>"text",
                                    "class"=>"form-control calendar",
                                    "name"=>"start",
                                    "label"=>false,
                                    "placeholder"=>"未入力は指定なしとする",
                                    "default"=>$start
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
                                    "default"=>$end
                                ]) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($error[ "start" ][ "end" ])): ?>
                        <small class="text-danger"><?= h($error[ "start" ]["end"]) ?></small>
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
                        <?= h($array_open[$this->request->getData("open")]) ?>
                        <?= $this->Form->hidden("open",[
                            "value"=>$this->request->getData('open')
                        ])?>
                    <?php else: ?>
                        <?php
                            $open = "";
                            if($this->request->getData( 'open' )){
                                $open = $this->request->getData("open");
                            } else {
                                if(isset($tenant[ 'open' ]) && $tenant[ 'open' ]) $open = $tenant["open"];
                            }
                        ?>
                        <div class="switchbutton" id="makeImg">
                            <?= $this->Form->checkbox("open",[
                                "id"=>"sample2check",
                                "value"=>1,
                                "default"=>$open
                            ])?>
                            <label for="sample2check">
                            <div id="sample2box"></div>
                            </label>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
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
                         規約に同意する</label>
                    </div>
                    <?php if(!empty($error[ "agree" ][ "_required" ])): ?>
                        <small class="text-danger"><?= h($error[ "agree" ]["_required"]) ?></small>
                    <?php endif; ?>
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
