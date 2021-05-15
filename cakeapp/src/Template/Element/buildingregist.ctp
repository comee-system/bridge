<div class="card-deck col-md-12 text-left w-100">
    <div class="card shadow-sm ">
    <?php if($editflag != false):?>
        <div class="card-header">
            <p class="my-0 font-weight-normal"><b><?= __("注意事項") ?></b></p>
            <p>
            物件登録にあたり、以下の内容をご確認ください。<br />
            当社は、当サイトにコンテンツを掲載するにあたって、その内容、機能等について<span class="text-danger">細心の注意を払っておりますが、コンテンツの内容が正確であるかどうか、最新のものであるかどうか、安全なものであるか等について保証をするものではなく、何らの責任を負うものではありません。</span>また、当社は通知することなく当サイトに掲載した情報の訂正、修正、追加、中断、削除等をいつでも行うことができるものとします。また、当サイト、または<span class="text-danger">コンテンツのご利用により、万一、ご利用者様に何らかの不都合や損害が発生したとしても、当社は何らの責任を負うものではありません。</span>

            </p>
        </div>
    <?php endif; ?>
    <?php
    $noborder = "";
    $none = "";
    //詳細ページのようにする
    if($editflag == false):
        $noborder = "noborder";
        $none = "d-none";
    endif;
    ?>
        <div class="card-body">

            <div class="row">
                <div class="col-2 "><?= __("物件名称") ?></div>
                <div class="col-2">
                <span class="badge badge-danger <?=$none?>"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if($type == "conf"):?>
                        <?= h($this->request->getData('name')) ?>
                        <?= $this->Form->hidden("name",[
                                "value"=>$this->request->getData('name')
                        ])?>
                    <?php else: ?>
                        <?php
                            $name = "";
                            if ( $this->request->getData('name')) :
                                $name = $this->request->getData("name");
                            else:
                                if(isset($build[ 'name' ]) && $build[ 'name' ]){
                                    $name = $build[ 'name' ];
                                }
                            endif;
                        ?>

                        <?= $this->Form->input("name",[
                            "type"=>"text",
                            "class"=>"form-control ".$noborder,
                            "label"=>false,
                            "placeholder"=>__("物件名を入力してください。"),
                            "default"=>$name
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
                    <span class="badge badge-danger <?=$none?>"><?= __("必須") ?></span>
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
                    <?php
                        $post1 = "";
                        if ( $this->request->getData('post1')) :
                            $post1 = $this->request->getData("post1");
                        else:
                            if(isset($build[ 'post1' ]) && $build[ 'post1' ]) $post1 = $build[ 'post1' ];
                        endif;
                        $post2 = "";
                        if ( $this->request->getData('post2')) :
                            $post1 = $this->request->getData("post2");
                        else:
                            if(isset($build[ 'post2' ]) && $build[ 'post2' ]) $post2 = $build[ 'post2' ];
                        endif;
                    ?>
                    <div class="col-8 ">
                        <div class="d-flex">
                            <?php if($editflag == false): ?>
                            <?= $build[ 'post1' ] ?> -
                            <?= $build[ 'post2' ] ?>
                            <?php else: ?>
                            <div class="text-nowrap">郵便番号</div>
                            <div class="w-25 ml-2">
                                <?= $this->Form->input("post1",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "maxlength"=>3,
                                    "default"=>$post1
                                ]) ?>
                            </div><div class="ml-2">-</div>
                            <div class="w-25 ml-2">
                                <?= $this->Form->input("post2",[
                                    "type"=>"text",
                                    "class"=>"form-control ",
                                    "label"=>false,
                                    "maxlength"=>4,
                                    "default"=>$post2,
                                    "onKeyUp"=>"AjaxZip3.zip2addr('post1','post2','pref','city','space');"
                                ]) ?>
                            </div>
                            <?php  endif; ?>
                        </div>
                        <?php
                            $pref = "";
                            if ( $this->request->getData('pref')) :
                                $pref = $this->request->getData("pref");
                            else:
                                if(isset($build[ 'pref' ]) && $build[ 'pref' ]) $pref = $build[ 'pref' ];
                            endif;
                        ?>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label class="<?= $none ?>">都道府県</label>
                                <?= $this->Form->select("pref", $array_prefecture,[
                                    "class"=>"form-control ".$noborder,
                                    "label"=>false,
                                    "empty"=>"選択してください",
                                    "default"=>$pref
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <?php
                                    $city = "";
                                    if ( $this->request->getData('city')) :
                                        $city = $this->request->getData("city");
                                    else:
                                        if(isset($build[ 'city' ]) && $build[ 'city' ]) $city = $build[ 'city' ];
                                    endif;
                                ?>
                                <label class="<?= $none ?>"><?= __("市区町村") ?> </label>
                                <?= $this->Form->input("city",[
                                    "type"=>"text",
                                    "class"=>"form-control ".$noborder,
                                    "label"=>false,
                                    "default"=>$city
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <?php
                                    $space = "";
                                    if ( $this->request->getData('space')) :
                                        $space = $this->request->getData("space");
                                    else:
                                        if(isset($build[ 'space' ]) && $build[ 'space' ]) $space = $build[ 'space' ];
                                    endif;
                                ?>
                                <label class="<?= $none ?>"><?= __("番地") ?> </label>
                                <?= $this->Form->input("space",[
                                    "type"=>"text",
                                    "class"=>"form-control ".$noborder,
                                    "label"=>false,
                                    "default"=>$space
                                ]) ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <?php
                                    $builds = "";
                                    if ( $this->request->getData('build')) :
                                        $builds = $this->request->getData("build");
                                    else:
                                        if(isset($build[ 'build' ]) && $build[ 'build' ]) $builds = $build[ 'build' ];
                                    endif;
                                ?>
                                <label class="<?= $none ?>"><?= __("ビル・マンション名") ?> </label>
                                <?= $this->Form->input("build",[
                                    "type"=>"text",
                                    "class"=>"form-control ".$noborder,
                                    "label"=>false,
                                    "default"=>$builds
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
                <span class="badge badge-danger <?= $none ?>"><?= __("必須") ?></span>
                </div>
                <div class="col-8">
                    <?php if($type == "conf"): ?>
                        <?= h($array_shop[$this->request->getData('shop_type')]) ?>
                        <?= $this->Form->hidden("shop_type",[
                                "value"=>$this->request->getData('shop_type')
                        ])?>
                    <?php else: ?>
                        <?php
                            $shop_type = "";
                            if ( $this->request->getData('shop_type')) :
                                $shop_type = $this->request->getData("shop_type");
                            else:
                                if(isset($build[ 'shop_type' ]) && $build[ 'shop_type' ]) $shop_type = $build[ 'shop_type' ];
                            endif;
                        ?>
                        <?= $this->Form->select("shop_type", $array_shop,[
                            "class"=>"form-control ".$noborder,
                            "label"=>false,
                            "empty"=>"選択してください",
                            "default"=>$shop_type
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
                <span class="badge badge-danger <?= $none ?>"><?= __("必須") ?></span>
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
                            <?php
                                $shop_area = "";
                                if ( $this->request->getData('shop_area')) :
                                    $shop_area = $this->request->getData("shop_area");
                                else:
                                    if(isset($build[ 'shop_area' ]) && $build[ 'shop_area' ]) $shop_area = $build[ 'shop_area' ];
                                endif;
                            ?>
                            <?= $this->Form->input("shop_area",[
                                "type"=>"text",
                                "class"=>"form-control ".$noborder,
                                "label"=>false,
                                "default"=>$shop_area
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
                <span class="badge badge-danger <?= $none ?>"><?= __("必須") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= $array_agreement[$this->request->getData('agreement')]; ?>
                        <?= $this->Form->hidden("agreement",[
                                "value"=>$this->request->getData('agreement')
                        ])?>
                    <?php else: ?>
                        <?php
                            $agreement = "";
                            if ( $this->request->getData('agreement')) :
                                $agreement = $this->request->getData("agreement");
                            else:
                                if(isset($build[ 'agreement' ]) && $build[ 'agreement' ]) $agreement = $build[ 'agreement' ];
                            endif;
                        ?>
                        <?= $this->Form->select("agreement", $array_agreement,[
                            "class"=>"form-control ".$noborder,
                            "label"=>false,
                            "empty"=>"選択してください",
                            "default"=>$agreement
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
                <span class="badge badge-danger <?= $none ?>"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('security_money')); ?>円
                            <?= $this->Form->hidden("security_money",[
                                    "value"=>$this->request->getData('security_money')
                            ])?>
                        <?php else: ?>
                            <?php
                                $security_money = "";
                                if ( $this->request->getData('security_money')) :
                                    $security_money = $this->request->getData("security_money");
                                else:
                                    if(isset($build[ 'security_money' ]) && $build[ 'security_money' ]) $security_money = $build[ 'security_money' ];
                                endif;
                            ?>
                            <?= $this->Form->input("security_money",[
                                "type"=>"text",
                                "class"=>"form-control ".$noborder,
                                "label"=>false,
                                "default"=>$security_money
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
                <span class="badge badge-danger <?= $none ?> "><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('rent_money')); ?>円
                            <?= $this->Form->hidden("rent_money",[
                                    "value"=>$this->request->getData('rent_money')
                            ])?>
                        <?php else: ?>
                            <?php
                                $rent_money = "";
                                if ( $this->request->getData('rent_money')) :
                                    $rent_money = $this->request->getData("rent_money");
                                else:
                                    if(isset($build[ 'rent_money' ]) && $build[ 'rent_money' ]) $rent_money = $build[ 'rent_money' ];
                                endif;
                            ?>
                            <?= $this->Form->input("rent_money",[
                                "type"=>"text",
                                "class"=>"form-control ".$noborder,
                                "label"=>false,
                                "default"=>$rent_money
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
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= h($this->request->getData('common_money')); ?>円
                        <?= $this->Form->hidden("common_money",[
                                "value"=>$this->request->getData('common_money')
                        ])?>
                    <?php else: ?>
                        <?php
                            $common_money = "";
                            if ( $this->request->getData('common_money')) :
                                $common_money = $this->request->getData("common_money");
                            else:
                                if(isset($build[ 'common_money' ]) && $build[ 'common_money' ]) $common_money = $build[ 'common_money' ];
                            endif;
                        ?>
                        <?= $this->Form->input("common_money",[
                            "type"=>"text",
                            "class"=>"form-control ".$noborder,
                            "label"=>false,
                            "default"=>$common_money
                        ]) ?>
                        <div class="mt-2 ml-2">円</div>
                        <div class="col-12 <?= $none ?>">
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
                <span class="badge badge-danger <?= $none ?>"><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format($this->request->getData('parking_count')); ?>台
                            <?= $this->Form->hidden("parking_count",[
                                    "value"=>$this->request->getData('parking_count')
                            ])?>
                        <?php else: ?>
                            <?php
                                $parking_count = "";
                                if ( $this->request->getData('parking_count')) :
                                    $parking_count = $this->request->getData("parking_count");
                                else:
                                    if(isset($build[ 'parking_count' ]) && $build[ 'parking_count' ]) $parking_count = $build[ 'parking_count' ];
                                endif;
                            ?>
                            <?= $this->Form->input("parking_count",[
                                "type"=>"text",
                                "class"=>"form-control ".$noborder,
                                "label"=>false,
                                "default"=>$parking_count
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
                <span class="badge badge-danger <?=$none?> "><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>
                        <?= $array_build[$this->request->getData('build_type')]; ?>
                        <?= $this->Form->hidden("build_type",[
                                "value"=>$this->request->getData('build_type')
                        ])?>
                    <?php else: ?>
                        <?php
                            $build_type = "";
                            if ( $this->request->getData('build_type')) :
                                $build_type = $this->request->getData("build_type");
                            else:
                                if(isset($build[ 'build_type' ]) && $build[ 'build_type' ]) $build_type = $build[ 'build_type' ];
                            endif;
                        ?>
                        <?= $this->Form->select("build_type", $array_build,[
                            "class"=>"form-control ".$noborder,
                            "label"=>false,
                            "empty"=>"選択してください",
                            "default"=>$build_type
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
                <span class="badge badge-danger <?=$none?> "><?= __("必須") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>
                        <?= $array_constract[$this->request->getData('constract_type')]; ?>
                        <?= $this->Form->hidden("constract_type",[
                                "value"=>$this->request->getData('constract_type')
                        ])?>
                    <?php else: ?>
                        <?php
                            $constract_type = "";
                            if ( $this->request->getData('constract_type')) :
                                $constract_type = $this->request->getData("constract_type");
                            else:
                                if(isset($build[ 'constract_type' ]) && $build[ 'constract_type' ]) $constract_type = $build[ 'constract_type' ];
                            endif;
                        ?>
                        <?= $this->Form->select("constract_type", $array_constract,[
                            "class"=>"form-control ".$noborder,
                            "label"=>false,
                            "empty"=>"選択してください",
                            "default"=>$constract_type
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
                    if($type == "conf" || $editflag == false ): ?>
                        ファイル名
                        <?php
                        $uploadfile = "";
                        $uploadfilename = "";
                        if ( isset($build[ 'uploadfile' ]) && $build[ 'uploadfile' ]) :
                            $uploadfile = $build[ 'uploadfile' ];
                            $uploadfilename = $build[ 'uploadfilename' ];
                        endif;
                        ?>
                        <?php if($uploadfile && $uploadfilename ): ?>
                        <a href="/upload/<?=$uploadfile?>" ><?=$uploadfilename?></a>
                        <?php endif; ?>
                        <p>
                        <?= $this->request->getData("fileupload.name") ?></p>
                        <?= $this->Form->hidden("uploadfile",[
                                "value"=>$uploadfile
                        ])?>
                        <?= $this->Form->hidden("uploadfilename",[
                                "value"=>$this->request->getData("fileupload.name")
                        ])?>
                    <?php else: ?>
                        <?php
                            $uploadfile = "";
                            $uploadfilename = "";
                            if ( isset($build[ 'uploadfile' ]) && $build[ 'uploadfile' ]) :
                                $uploadfile = $build[ 'uploadfile' ];
                                $uploadfilename = $build[ 'uploadfilename' ];
                            endif;
                        ?>
                        <a href="/upload/<?=$uploadfile?>" ><?=$uploadfilename?></a>
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
                        <?php
                            $other = "";
                            if ( $this->request->getData('other')) :
                                $other = $this->request->getData("other");
                            else:
                                if(isset($build[ 'other' ]) && $build[ 'other' ]) $other = $build[ 'other' ];
                            endif;
                        ?>
                        <?= $this->Form->input("other",[
                            "type"=>"textarea",
                            "class"=>"form-control w-100 ".$noborder,
                            "name"=>"other",
                            "label"=>false,
                            "default"=>$other
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-2"><?= __("掲載期間") ?></div>
                <div class="col-2">
                <span class="badge badge-danger <?= $none ?>"><?= __("必須") ?></span>
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
                            <?php
                                $start = "";
                                if ( $this->request->getData('start')) :
                                    $start = $this->request->getData("start");
                                else:
                                    if(isset($build[ 'start' ]) && $build[ 'start' ]) $start = date("Y/m/d",strtotime($build[ 'start' ]));
                                endif;
                            ?>
                            <?php
                                $end = "";
                                if ( $this->request->getData('end')) :
                                    $end = $this->request->getData("end");
                                else:
                                    if(isset($build[ 'end' ]) && $build[ 'end' ]) $end = date("Y/m/d",strtotime($build[ 'end' ]));
                                endif;
                            ?>
                            <div>
                                <?= $this->Form->input("start",[
                                    "type"=>"text",
                                    "class"=>"form-control calendar ".$noborder,
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
                                    "class"=>"form-control calendar ".$noborder,
                                    "name"=>"end",
                                    "label"=>false,
                                    "placeholder"=>"未入力は指定なしとする",
                                    "default"=>$end
                                ]) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($error[ "start" ][ "end" ])): ?>
                        <small class="text-danger"><?= h($error[ "start" ]["end"]) ?></small>
                    <?php endif; ?>

                </div>
            </div>
            <?php if($editflag != false):?>
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
                        <?php
                            $open = "";
                            if ( $this->request->getData('open')) :
                                $open = $this->request->getData("open");
                            else:
                                if(isset($build[ 'open' ]) && $build[ 'open' ]) $open = $build[ 'open' ];
                            endif;
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
            <?php endif; ?>
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
                            <?php
                                $message = "";
                                if ( $this->request->getData('message')) :
                                    $message = $this->request->getData("message");
                                else:
                                    if(isset($build[ 'message' ]) && $build[ 'message' ]) $message = $build[ 'message' ];
                                endif;
                            ?>
                            <?= $this->Form->input("message",[
                                "type"=>"textarea",
                                "class"=>"form-control w-100",
                                "name"=>"message",
                                "label"=>false,
                                "value"=>$message
                            ]) ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($editflag != false):?>

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
            <?php endif; ?>
        </div>
    </div>
</div>
