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


    }
    public function buildlist(){

    }
    public function buildregist(){

        $type = "";
        $error = [];
        $uploadfile = "";
        //確認画面
        if(
            $this->request->getData("conf") ||
            $this->request->getData("regist")
        ){
            //エラーチェック
            $build = $this->Builds->newEntity();
            $build = $this->Builds->patchEntity($build, $this->request->getData());
            $error = $build->errors();
            if(!$build->errors()){

                $dir = realpath(WWW_ROOT . "/upload");
                $limitFileSize = 1024 * 1024;
                try {
                   $uploadfile = $this->Upload->file_upload($this->request->getData('fileupload'), $dir, $limitFileSize);
                } catch (RuntimeException $e){
                    $this->Flash->error(__('ファイルのアップロードができませんでした.'));
                    $this->Flash->error(__($e->getMessage()));
                }

                $type = "conf";
                //登録完了
                if($this->request->getData("regist")){
                    $build->user_id = $this->Auth->user('id');
                    $this->Builds->save($build);
                    $type = "fin";
                    return $this->redirect(['action' => '/buildfin']);
                }
            }

        }

        $this->set("type",$type);
        $this->set("error",$error);
        $this->set("uploadfile",$uploadfile);
    }
    public function buildfin(){

        $this->set("type","fin");
        $this->render("buildregist");

    }
    public function room(){


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
        if($tenant->prefs) $prefs = explode(",",$tenant->prefs);
        $jobtypes = [];
        if($tenant->jobtypes) $jobtypes = explode(",",$tenant->jobtypes);
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
                        foreach($this->request->getData("pref") as $key=>$value){
                            $TenantHope = $this->TenantHope->newEntity();
                            $TenantHope->pref = $key;
                            $TenantHope->tenant_id = $tenant->id;
                            $this->TenantHope->save($TenantHope);
                        }
                        foreach($this->request->getData("jobtype") as $key=>$value){
                            foreach($value as $k=>$val){
                                $TenantJob = $this->TenantJob->newEntity();
                                $TenantJob->jobtype = $k;
                                $TenantJob->tenant_id = $tenant->id;
                                $this->TenantJob->save($TenantJob);
                            }
                        }

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
            $data[$key]['rent_money_min_jp'] = ($value[ 'rent_money_min' ]/10000)." 万円";
            $data[$key]['rent_money_max_jp'] = ($value[ 'rent_money_max' ]/10000)." 万円";
        }
      return $data;
    }
}
