<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Bridge</a></li>
    <li class="breadcrumb-item"><a href="#">会員登録</a></li>
  </ol>
</nav>

<main>

  <div class="container">
    <h3>会員登録</h3>
    <section class="mb-5">
        <?= $this->Form->create(null, [
            'type'=>'post',
            'url'=>['controller'=>'Users',
            'action'=>'index'
        ]]) ?>

            <div class="row col-md-10">
                <div class="col-md-2"><?=__("氏名")?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?=__("必須")?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                        <label><?=__("姓")?>　</label>
                        <input type="text" name="sei" value="sei"  class="form-control" />
                </div>
                <div class="col-md-4 form-inline">
                    <label><?=__("名")?>　</label>
                    <input type="text" name="mei" value="mei" class="form-control" />

                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?=__("氏名(ふりがな)")?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?=__("必須")?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                        <label><?=__("せい")?></label>
                        <input type="text" name="sei_kana" value="sei_kana" class="form-control" />
                </div>
                <div class="col-md-4 form-inline">
                    <label><?=__("めい")?></label>
                    <input type="text" name="mei_kana" value="mei_kana" class="form-control" />

                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?=__("企業名")?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?=__("必須")?>
                    </span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="company" value="company" class="form-control" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?=__("業種")?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?=__("必須")?>
                    </span>
                </div>
                <div class="col-md-7">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option value="0" >業種を選択してください</option>
                    <?php foreach($array_job as $key=>$value ):  ?>
                        <option value="<?=$key?>"><?=h($value)?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?=__("住所")?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?=__("必須")?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                        <label><?=__("郵便番号")?></label>
                        <input type="text" name="post" value="" class="form-control" />
                </div>
                <div class="col-md-4 form-inline">
                    <input type="text" name="post" value="" class="form-control" />
                </div>
            </div>
            <div class="col-md-4"><?=__("都道府県")?>
                <input type="text" name="prefecture" value="" class="form-control" />
            </div>
            <div class="col-md-4 pull-right"><?=__("市区町村")?>
                <input type="text" name="city" value="" class="form-control" />
            </div>






            <?= $this->Form->submit("登録する") ?>


        <?= $this->Form->end(); ?>
    </section>
  </div><!-- /.container -->

</main>