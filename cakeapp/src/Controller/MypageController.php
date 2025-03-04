<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class MypageController extends AppController
{
    public $paginate = [
        'limit' => 3,
    ];
    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Tenants");
        $this->loadModel("TenantJob");
        $this->loadModel("TenantHope");
        $this->loadModel("Builds");
        $this->loadModel("ViewTenants");
        $this->loadModel("Users");
        $this->loadModel("Comments");
        $this->loadComponent('Paginator');
        $this->upload = $this->loadComponent("Upload");
        $this->password = $this->loadComponent("Password");

        $array_status = Configure::read("array_status");
        $array_prefecture = Configure::read('array_prefecture');
        $this->array_prefecture = $array_prefecture;
        $array_shop = Configure::read('array_shop');
        $array_agreement = Configure::read('array_agreement');
        $array_build = Configure::read('array_build');
        $array_constract = Configure::read('array_constract');
        $array_floor = Configure::read('array_floor');
        $array_rent_money = Configure::read('array_rent_money');
        $array_space_money = Configure::read('array_space_money');
        $array_job = Configure::read('array_job');
        $array_sub = Configure::read('array_sub');
        $array_job_type = Configure::read('array_job_type');
        $array_open = Configure::read('array_open');
        $array_build_status = Configure::read('array_build_status');
        $this->array_response = Configure::read('array_response');
        $this->array_code = Configure::read('array_code');
        $this->array_read = Configure::read('array_read');


        $user = $this->Auth->user();
        //ログイン済みで同意していないときは編集画面に遷移する
        if(!empty($user['id'])){
            $user = $this->Users->find('all')->select(['id','agree'])->where(['id'=>$user[ 'id' ]])->first();
            if(!$user->agree){
                return $this->redirect(['controller'=>"/",'action'=>'/users/edit/']);
            }
        }


        $this->set("array_status",$array_status);
        $this->set("array_prefecture",$array_prefecture);
        $this->set("array_shop",$array_shop);
        $this->set("array_agreement",$array_agreement);
        $this->set("array_build",$array_build);
        $this->set("array_constract",$array_constract);
        $this->set("array_floor",$array_floor);
        $this->set("array_rent_money",$array_rent_money);
        $this->set("array_space_money",$array_space_money);
        $this->set("array_job",$array_job);
        $this->set("array_sub",$array_sub);
        $this->set("array_job_type",$array_job_type);
        $this->set("array_open",$array_open);
        $this->set("array_build_status",$array_build_status);
        $this->set("array_code",$this->array_code);
        $this->set("array_response",$this->array_response);
        $this->set("array_read",$this->array_read);

        $this->set("editflag",true);
    }

    /**
     * Displays a index
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function index(){
        $user = $this->Auth->user();

        $builds = $this->Builds->find();
        $builds = $builds->select([
            'Builds.id',
            'Builds.name',
            'Builds.build_status',
            'Builds.created',
            'Builds.start',
            'Builds.status',
            'c.comment',
            'c.build_id',
            'c.tenant_id',
            'c.code',
        ]);
        $builds = $builds->join([
            'table' => 'comments',
            'alias' => 'c',
            'type' => 'INNER',
            'conditions' => 'c.build_id=Builds.id'
        ]);
        $builds = $builds->where([
            "c.user_id"=>$user[ 'id' ],
            "Builds.status !="=>5
        ]);
        $builds = $builds->group(["c.build_id","c.tenant_id"]);
        $builds = $this->paginate($builds);


        $this->set(compact('builds'));
        $this->set("compnent",$this->password);

    }
    public function buildlist(){
        $user = $this->Auth->user();
        $builds = $this->Builds->find()->where([
            "user_id"=>$user[ 'id' ],
            "status != "=> 5 //交渉中止は出さない
        ]);

        if($this->request->is('post')){
            if(strlen($this->request->getData('status'))){
                $builds = $builds->where([
                    'status'=>$this->request->getData("status")
                ]);
            }
        }
        $builds = $this->paginate($builds);

        $this->set(compact('builds'));
        $this->set("compnent",$this->password);

    }
    //$edittypeがdetailの時は編集を行わない
    public function buildregist($id = "",$edittype = ""){

        $user = $this->Auth->user();
        $type = "";
        $error = [];
        $setUploadfile = "";
        $setUploadfilename = "";
        $uploadfile = "";
        $editflag = true;
        if($id){
            $build = $this->Builds->get($id);
            //データが自分の物件ではないときに修正不可とする
            if($build[ 'user_id' ] != $user[ 'id' ] || $edittype == "detail"){
                $editflag = false;
            }
            $setUploadfile = $build->uploadfile;
            $setUploadfilename = $build->uploadfilename;
        }else{
            $build = $this->Builds->newEntity();
        }







        //確認画面
        if(
            $this->request->getData("conf") ||
            $this->request->getData("regist") ||
            $this->request->getData("onetime")
        ){
            //エラーチェック
            if($this->request->getData("onetime")){
                $build = $this->Builds->patchEntity($build, $this->request->getData(),['validate'=>false]);
            }else{
                $build = $this->Builds->patchEntity($build, $this->request->getData());
            }
            $error = $build->errors();
            if(!$build->errors()){
                if($this->request->getData('fileupload.name')){
                    $dir = realpath(WWW_ROOT . "/upload");
                    $limitFileSize = 1024 * 1024;
                    try {
                    $uploadfile = $this->Upload->file_upload($this->request->getData('fileupload'), $dir, $limitFileSize);

                    } catch (RuntimeException $e){
                        $this->Flash->error(__('ファイルのアップロードができませんでした.'));
                    }
                }
                $type = "conf";



                //登録完了
                if(
                    $this->request->getData("regist") ||
                    $this->request->getData("onetime")
                ){
                    $build->user_id = $this->Auth->user('id');

                    if(empty($this->request->getData('uploadfile'))){
                       $build->uploadfile = $setUploadfile;
                       $build->uploadfilename = $setUploadfilename;
                    }
                    if($this->request->getData("onetime")){
                        $build->status = 0;
                    }else{
                        $build->status = 1;
                    }
                    $this->Builds->save($build);

                    if($this->request->getData("onetime")){
                        $this->Flash->success(__('一時保存を行いました。'));
                        return $this->redirect(['action' => '/buildlist']);
                    }

                    $type = "fin";
                    return $this->redirect(['action' => '/buildfin']);
                }
            }

        }

        $this->set("id",$id);
        $this->set("build",$build);
        $this->set("type",$type);
        $this->set("error",$error);
        $this->set("uploadfile",$uploadfile);
        $this->set("editflag",$editflag);
    }
    public function buildfin(){

        $this->set("type","fin");
        $this->render("buildregist");

    }
    public function room($code="", $id,$tenant_id=""){

        $user = $this->Auth->user();
        $builds = $this->Builds->find()->where([
            "id"=>$id
        ])->first();
        if ($this->request->is('post')) {
            $comments = $this->Comments->newEntity();
            $comments = $this->Comments->patchEntity($comments, $this->request->getData());
            $comments->response = 2; //1:admin 2:user
            $comments->code = array_keys($this->array_code,$code)[0]; //1.build 2.tenant
            $comments->build_id = $id;
            if($tenant_id > 0) $comments->tenant_id = $tenant_id;
            $comments->user_id = $user[ 'id' ];
            //ファイルのアップロード
            if($this->request->getData('upload')){
                $dir = realpath(WWW_ROOT . "/upload");
                $limitFileSize = 1024 * 1024;
                try {
                    $uploadfile = $this->Upload->file_upload($this->request->getData('upload'), $dir, $limitFileSize);
                    $comments->file = $uploadfile;
                    $comments->filename = $this->request->getData('upload')['name'];
                } catch (RuntimeException $e){
                    //$this->Flash->error(__('ファイルのアップロードができませんでした.'));
                }
            }
            if ($this->Comments->save($comments)) {

            }
            return $this->redirect("/mypage/room/".$code."/".$id."/".$tenant_id);
        }
        $this->set("compnent",$this->password);
        $this->set("builds",$builds);
        $this->set("id",$id);
        $this->set("code",$code);
        $this->set("tenant_id",$tenant_id);


    }
    public function staff(){

        $this->render("room");
    }
    public function message($id){

        $this->render("room");
    }

    public function tenant(){
        $user = $this->Auth->user();
        $tenant = $this->ViewTenants->find()->where(['user_id'=>$user[ 'id' ]]);
        if($this->request->getData("name")){
            $tenant = $tenant->where(["name"=>$this->request->getData( "name" ) ]);
        }
        $tenant = $this->paginate($tenant);

        $tenant = $this->__setPref($tenant);
        $tenant = $this->__setRentJp($tenant);

        $this->set(compact('tenant'));
        $this->set("compnent",$this->password);
    }
    public function tenantedit($id){
        $user = $this->Auth->user();
        //テナント更新画面
        $tenant = $this->ViewTenants->find()
            ->where([
                'id'=>$id,
                'user_id'=>$user['id'],
            ])
            ->first();
        $prefs = [];
        $jobtypes = [];
        /*
        $prefs = [];
        if($tenant->prefs) $prefs = explode(",",$tenant->prefs);
        $jobtypes = [];
        if($tenant->jobtypes) $jobtypes = explode(",",$tenant->jobtypes);
        */

        $this->tenantregist($id);
        $this->set(compact('tenant'));
        $this->set("id",$id);
        $this->set("prefs",$prefs);
        $this->set("jobtypes",$jobtypes);
        $this->render("tenantregist");
    }
    public function tenantregist($id = ""){

        $type = "";
        $button = "確認する";
        $buttonname = "conf";
        //確認画面
        $error = [];
        $error_hope = [];
        $error_job = [];

        if(
            $this->request->getData("conf") ||
            $this->request->getData("regist")
        ){
            //エラーチェック
            if ($id >0 ) {
                $tenant = $this->Tenants->get($id, [
                    'contain' => [],
                ]);
            } else {
                $tenant = $this->Tenants->newEntity();
            }
            $tenant = $this->Tenants->patchEntity($tenant, $this->request->getData());
            $TenantJob = $this->TenantJob->newEntity();
            $TenantJob = $this->TenantJob->patchEntity($TenantJob, $this->request->getData());
            $TenantHope = $this->TenantHope->newEntity();
            $TenantHope = $this->TenantHope->patchEntity($TenantHope, $this->request->getData());
            $error = $tenant->errors();
            $error_hope = $TenantHope->errors();
            $error_job = $TenantJob->errors();

            if(
                !$tenant->errors() &&
                !$TenantJob->errors() &&
                !$TenantHope->errors()
            ){
                $button = "登録する";
                $buttonname = "regist";
                $type = "conf";
                //登録完了
                if($this->request->getData("regist")){
                    $connection = ConnectionManager::get('default');
                    $connection->begin();
                    try {
                        $tenant->user_id = $this->Auth->user('id');
                        $this->Tenants->save($tenant);
                        //IDがあるときはTenantHopeとTenantJobのデータを削除する
                        if($id > 0 ){
                            $this->TenantHope->deleteAll(['tenant_id'=>$tenant->id]);
                            $this->TenantJob->deleteAll(['tenant_id'=>$tenant->id]);
                        }
                        $num = 1;
                        foreach($this->request->getData("pref") as $key=>$value){
                            $TenantHope = $this->TenantHope->newEntity();
                            $TenantHope->pref = $value;
                            $TenantHope->tenant_id = $tenant->id;
                            $TenantHope->Number = $num;
                            $num++;
                            $this->TenantHope->save($TenantHope);
                        }
                        /*
                        foreach($this->request->getData("jobtype") as $key=>$value){
                            foreach($value as $k=>$val){
                                $TenantJob = $this->TenantJob->newEntity();
                                $TenantJob->jobtype = $k;
                                $TenantJob->tenant_id = $tenant->id;
                                $this->TenantJob->save($TenantJob);
                            }
                        }
                        */
                        //usersのimportを0にする
                        $user = $this->Users->get($this->Auth->user('id'));
                        $set = [];
                        $set['import'] = 0;
                        $user = $this->Users->patchEntity($user, $set,['validate'=>false]);
                        $this->Users->save($user);

                        $connection->commit();
                        //$type = "fin";
                        return $this->redirect(['action' => '/tenant/fin']);
                    }catch(\Exception $e){
                        echo "error";
                        $connection->rollback();
                        exit();
                    }

                }

            }
        }


        $this->set("type",$type);
        $this->set("button",$button);
        $this->set("buttonname",$buttonname);
        $this->set("error",$error);
        $this->set("error_hope",$error_hope);
        $this->set("error_job",$error_job);
        $this->set("id",$id);
    }
    public function tenantfin(){

        $type = "fin";
        $this->set("type",$type);
        $this->render("tenantregist");

    }
    public function __setPref($dat){
        $data = $dat->toArray();

        foreach($data as $key=>$value){
            $list = [];
            $ex = explode(",",$value[ 'prefs' ]);
            foreach($ex as $k=>$val){
                if(isset($this->array_prefecture[$val])){
                    $list[] = $this->array_prefecture[$val];
                }
            }
            if($list) $data[$key]['prefline'] = implode(",",$list);
        }

      return $data;
    }
    public function __setRentJp($data){
        foreach($data as $key=>$value){
            //$data[$key]['rent_money_min_jp'] = ($value[ 'rent_money_min' ]/10000)." 万円";
            //$data[$key]['rent_money_max_jp'] = ($value[ 'rent_money_max' ]/10000)." 万円";
            $data[$key]['rent_money_min_jp'] = number_format($value[ 'rent_money_min' ])." 円";
            $data[$key]['rent_money_max_jp'] = number_format($value[ 'rent_money_max' ])." 円";
        }
      return $data;
    }


}
