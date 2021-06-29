<div class="card-deck col-md-12 text-left w-100">
    <div class="card shadow-sm ">
    <?php if($editflag != false):?>
        <div class="card-header">
            <p class="my-0 font-weight-normal"><b><?= __("注意事項") ?></b></p>
            <p>
            物件登録にあたり、以下の内容をご確認ください。<br />
            当社は、当サイトにコンテンツを掲載するにあたって、その内容、機能等について細心の注意を払っておりますが、コンテンツの内容が正確であるかどうか、最新のものであるかどうか、安全なものであるか等について保証をするものではなく、何らの責任を負うものではありません。また、当社は通知することなく当サイトに掲載した情報の訂正、修正、追加、中断、削除等をいつでも行うことができるものとします。また、当サイト、またはコンテンツのご利用により、万一、ご利用者様に何らかの不都合や損害が発生したとしても、当社は何らの責任を負うものではありません。
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
                    <?php /*
                        <?= h($this->request->getData('post1')) ?>-
                        <?= h($this->request->getData('post2')) ?>
                        <br />
                    */ ?>
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
                    /*
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
                    */
                    ?>
                    <div class="col-8 ">
<?php /*
                        <?php if($editflag == false): ?>
                        <?= $build[ 'post1' ] ?> -
                        <?= $build[ 'post2' ] ?>
                        <?php else: ?>
                        <div class="text-nowrap">郵便番号</div>
                        <div class="d-flex">
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

                            <div class="ml-2">
                                <?= $this->Form->button("住所から郵便番号を検索",[
                                    "name"=>"searchAddress",
                                    "class"=>"btn-sm btn-primary w-100"
                                ])?>
                            </div>

                            <?php  endif; ?>

                        </div>
*/ ?>
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
                                <?php /*
                                <label class="<?= $none ?>"><?= __("ビル・マンション名") ?> </label>
                                <?= $this->Form->input("build",[
                                    "type"=>"text",
                                    "class"=>"form-control ".$noborder,
                                    "label"=>false,
                                    "default"=>$builds
                                ]) ?>
                                */ ?>
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
                <div class="col-2"><?= __("契約面積") ?></div>
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
                            <div class="row">
                                <div class="col-12">
                                    <small>
                                        ※複数階の場合は、こちらに総面積を記入し、その他要望事項の欄に記載してください。<br />
                                        例：契約面積　１階　５０坪、２階　３０坪
                                    </small>
                                </div>
                            </div>
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
                                if($noborder) $rent_money = number_format($rent_money);
                            ?>
                            <?= $this->Form->input("rent_money",[
                                "type"=>"text",
                                "class"=>"form-control ".$noborder,
                                "label"=>false,
                                "default"=>$rent_money
                            ]) ?>
                            <div class="mt-2 ml-2">円</div>
                            <div class="row">
                                <div class="col-12">
                                    <small>
                                     ※賃料以外（駐車場契約金　等）は、その他要望事項の欄に記載してください。
                                    </small>
                                </div>
                            </div>
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
                <div class="col-2"><?= __("店舗形態") ?></div>
                <div class="col-2">
                <span class="badge badge-secondary <?= $none ?>"><?= __("任意") ?></span>
                </div>
                <div class="col-8">
                    <?php if($type == "conf"): ?>
                        <?php if(isset( $array_shop[$this->request->getData('shop_type')] ) ): ?>
                        <?= h($array_shop[$this->request->getData('shop_type')]) ?>
                        <?= $this->Form->hidden("shop_type",[
                                "value"=>$this->request->getData('shop_type')
                        ])?>
                        <?php endif; ?>
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
                <div class="col-2"><?= __("契約形態") ?></div>
                <div class="col-2">
                    <span class="badge badge-secondary <?= $none ?>"><?= __("任意") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?php if(isset( $array_agreement[$this->request->getData('agreement')] ) ): ?>
                        <?= $array_agreement[$this->request->getData('agreement')]; ?>
                        <?= $this->Form->hidden("agreement",[
                                "value"=>$this->request->getData('agreement')
                        ])?>
                        <?php endif; ?>
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
                <span class="badge badge-secondary <?= $none ?>"><?= __("任意") ?></span>
                </div>
                <div class="col-8 ">
                    <div class="input-group">
                        <?php if($type == "conf" ): ?>
                            <?= number_format((int)$this->request->getData('security_money')); ?>円
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
                                if($noborder) $security_money = number_format($security_money);
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
                <div class="col-2"><?= __("共益費") ?></div>
                <div class="col-2">
                <span class="badge badge-secondary <?= $none ?>"><?= __("任意") ?></span>
                </div>
                <div class="col-8 input-group">
                    <?php if($type == "conf" ): ?>
                        <?= h((int)$this->request->getData('common_money')); ?>円
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
                            if($noborder) $common_money = number_format((int)$common_money);
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
                <div class="col-2"><?= __("建物の構造") ?></div>
                <div class="col-2">
                <span class="badge badge-secondary <?= $none ?>"><?= __("任意") ?></span>
                </div>
                <div class="col-8 ">
                    <?php if($type == "conf" ): ?>

                        <?php if(isset($array_constract[$this->request->getData('constract_type')])): ?>
                        <?= $array_constract[$this->request->getData('constract_type')]; ?>
                        <?= $this->Form->hidden("constract_type",[
                                "value"=>$this->request->getData('constract_type')
                        ])?>
                        <?php endif; ?>
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
                <div class="col-3"><?= __("その他要望事項") ?></div>
                <div class="col-1">
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
                                <span class="ml-2 position-absolute" id="openText" style="top:4px;left:120px;">
                                <?php if($open): ?>
                                <?= h($array_open[$open]) ?>
                                <?php else: ?>
                                    <?= h($array_open[0]) ?>
                                <?php endif; ?>
                                </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-4">&nbsp;</div>
                <div class="col-8 text-danger">
                    <small>
                    <?= __("公開設定が非公開の場合は、別途ご依頼後に物件のマッチングを行います。") ?>
                    </small>
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
                        <?php if ($id > 0): ?>
                            <input type="hidden" name="agree" value="on" />
                        <?php else: ?>
                        <div class="alert-primary text-center" >
                            <label>
                            <input type="checkbox" name="agree" value="on" required/>
                            <a href="/pdf/buildpolicy.pdf" target=_blank >物件登録規約</a>に同意する</label>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
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
                        <?php if (!$id): ?>
                            <?= $this->Form->input("一時保存して終了",[
                                "type"=>"submit",
                                "value"=>"on",
                                "name"=>"onetime",
                                "class"=>"btn btn-secondary w-100 text-white"
                            ]) ?>
                        <?php endif; ?>
                        <?php if ($admin): ?>
                            <?= $this->Html->link("一覧に戻る","/admin/users/build/",[
                                "class"=>"btn btn-secondary w-100"
                            ]) ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-4 mx-auto">
                        <?= $this->Form->input("入力内容を確認する",[
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
