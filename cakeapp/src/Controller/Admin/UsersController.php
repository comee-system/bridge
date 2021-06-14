<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use RuntimeException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public $paginate = [
        'limit' => 16,
    ];
    public function initialize()
    {
      parent::initialize();
      $this->loadModel("Tenants");
      $this->loadModel("TenantJob");
      $this->loadModel("TenantHope");
      $this->loadModel("Builds");
      $this->loadModel("Comments");

      $this->mailsend = $this->loadComponent('MailSend');

      $this->loadModel("ViewTenants");
        $this->loadModel("Users");
        $this->loadComponent('Paginator');
        $this->upload = $this->loadComponent("Upload");
        $this->password = $this->loadComponent("Password");

      $this->array_prefecture = Configure::read("array_prefecture");


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
      $array_agreement_status = Configure::read('array_agreement_status');
      $array_tenant_status = Configure::read('array_tenant_status');
      $array_role = Configure::read('array_role');
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
      $this->set("array_agreement_status",$array_agreement_status);
      $this->set("array_role",$array_role);
      $this->set("array_tenant_status",$array_tenant_status);
      $this->set("editflag",true);

      //レイアウトの指定
      $this->viewBuilder()->setLayout('Admin/default');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $query = $this->Users->find();
        if($this->request->getData('name')){
            $query = $query->where([
                "OR"=>[
                    'sei  LIKE '=>'%'.$this->request->getData( 'name' ).'%',
                    'mei  LIKE '=>'%'.$this->request->getData( 'name' ).'%'
                ]
            ]);
        }
        if($this->request->getData('company')){
            $query = $query->where([
                'company  LIKE '=>'%'.$this->request->getData( 'company' ).'%'
            ]);
        }
        if($this->request->getData('agree')){
            $query = $query->where([
                'agree'=>$this->request->getData( 'agree' )
            ]);
        }
        if($this->request->getData('job')){
            $query = $query->where([
                'job'=>$this->request->getData( 'job' )
            ]);
        }
        $query = $query->order(["role"=>"is null ASC","agree"=>"is null ASC","modified"=>"ASC"]);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function import(){
        if ($this->request->is('post')) {
            $file = $this->request->getData('file');
            if(!$file['tmp_name']){
                $this->Flash->error('ファイルが確認できませんでした。');
                return $this->redirect(['action' => 'import']);
            }

            //CSVアップロード
            $filePath = WWW_ROOT.'/import/' . date("YmdHis") . $file['name'];
            move_uploaded_file($file['tmp_name'], $filePath);
            $f = fopen($filePath, "r");
            $csvData = [];
            while($line = fgetcsv($f)){
                $csvData[] = $line;
            }
            $connection = ConnectionManager::get('default');
            $connection->begin();
            $err_row = [];
            $mail = [];
            $errmsg = [];
            try {

                foreach($csvData as $key=>$value){
                    if($key > 0){
                        $user = $this->Users->newEntity();
                        $data = [];
                        $data['sei'         ] = $value[0];
                        $data['mei'         ] = $value[1];
                        $data['sei_kana'    ] = $value[2];
                        $data['mei_kana'    ] = $value[3];
                        $data['company'     ] = $value[4];
                        $data['post'        ] = $value[5];
                        $data['city'        ] = $value[7 ];
                        $data['prefecture'  ] = array_search($value[6],$this->array_prefecture);
                        $data['space'       ] = $value[8 ];
                        $data['build'       ] = $value[9 ];
                        $data['busyo'       ] = $value[10];
                        $data['tel'         ] = $value[11];
                        $data['email'       ] = $value[12];
                        $data['password'    ] = $value[13];
                        $data['import'      ] = 1;
                        //メール送信データ
                        $mail[$key]['text' ] = $value[14];
                        $mail[$key]['email'] = $value[12];
                        $mail[$key]['name' ] = $value[0].$value[1];
                        $mail[$key]['pw'] = $value[13];

                        $user   = $this->Users->patchEntity($user, $data,["validate"=>"import"]);
                        //var_dump($user->getErrors()[ 'email' ]);
                        $err = $user->getErrors();
                        if(isset($err['email']['custom']) ) $errmsg[] = $key."行目. ".$err['email']["custom"];
                        if(isset($err['email']['email']) ) $errmsg[] = $key."行目. ".$err['email']["email"];
                        if($user->getErrors()){
                            $err_row[] = 1;
                        }else{
                            $user->import = 1;
                            $this->Users->save($user);
                            $tenant = $this->Tenants->newEntity();
                            $tenant->user_id   = $user->id;
                            $tenant->name      = $value[15];
                            $tenant->floor     = $value[16];
                            $tenant->min_floor = $value[17];
                            $tenant->max_floor = $value[18];
                            $tenant->rent_money_min = $value[19];
                            $tenant->rent_money_max = $value[20];
                            $this->Tenants->save($tenant);
                            $err_row[] = 0;
                        }
                    }
                }


            }catch(\Exception $e){
                //echo "error";
                //$connection->rollback();
                //exit();
                $err_row[] = 1;
            }
            if(array_sum($err_row)){
                $imp = implode("<br />",$errmsg);
                $this->Flash->error('データのインポートに失敗しました。<br />'.$imp);

                $connection->rollback();
            }else{
                //メール配信
                foreach($mail as $key=>$value){
                    $this->mailsend->userImportMail($value);
                }
                $this->Flash->success(__('データのインポートに成功しました。'));
                $connection->commit();
            }
            return $this->redirect(['action' => 'import']);

        }
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>false]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->___regist($user, $id);

        $this->set(compact('user'));
        $this->set('actionkey', "edit/".$id);
        $this->__setUserVariable($user);
        $this->set("password", "");
    }
    /**
     * 会員登録・編集処理
     */
    public  function ___regist($user, $id = "")
    {
        $render = "";
        if ($this->request->is('post') ) {
            $ref = $this->referer(null, true);
            //patchEntityに入るとvalidationが走る
            if($id && !$this->request->getData("back")){
                $user   = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>"edit"]);
            }else{
                $user   = $this->Users->patchEntity($user, $this->request->getData());
            }
            $errors = $user->getErrors();
            $imp    = self::__getErrorMessage($errors);
            if(!$this->request->getData("back")) {
                if (empty($errors) ) {
                    if($this->request->getData("editconf")){
                        $render = "editconf";
                        $this->set('actionkey', "edit/".$id);
                        $this->set("id",$id);
                    }else{
                        $this->setPostString($user);
                        $this->setTelString($user);

                        //更新の際、空欄の場合はパスワードを変更しない
                        if($id > 0 && !$this->request->getData('password') ){
                            unset($user->password);
                        }
                        if ($this->Users->save($user)) {
                            if($id > 0 ){
                                $this->Flash->success(__('会員情報編集が完了しました。'));
                            }else{
                                $this->Flash->success(__('会員登録が完了しました。'));
                            }
                            return $this->redirect("/admin/users");
                        } else {
                            $this->Flash->error(__('会員登録に失敗しました。'));
                        }
                    }
                }else{
                    $this->Flash->error(__('会員登録に失敗しました。<br />' . $imp));
                }
            }
            foreach ($this->request->getData() as $key => $value) {
                $this->set($key, $value);
            }
        }

        $this->set(compact('user'));
        if($render) $this->render($render);
    }
    public function setPostString($user)
    {
        $user->post = sprintf(
            "%s-%s",
            $this->request->getData('post1'),
            $this->request->getData('post2')
        );
    }
    public function setTelString($user)
    {
        $user->tel = sprintf(
            "%s-%s-%s",
            $this->request->getData('tel1'),
            $this->request->getData('tel2'),
            $this->request->getData('tel3')
        );
    }
    public static function __getErrorMessage($errors)
    {
        $errmsg = [];
        $imp = "";
        if (!empty($errors)) {
            foreach ($errors as $key => $value) {
                foreach ($value as $k => $val) {
                    $errmsg[] = $val;
                }
            }
            $imp = implode("<br />", $errmsg);
        }
        return $imp;
    }

    public function __setUserVariable($user){
        $post[0] = "";
        $post[1] = "";
        if($user->post) $post = explode("-", $user->post);
        $this->set("post1", $post[0]);
        $this->set("post2", $post[1]);
        $tel[0] = $tel[1] = $tel[2] = "";
        if($user->tel) $tel = explode("-", $user->tel);
        $this->set("tel1", $tel[0]);
        $this->set("tel2", $tel[1]);
        $this->set("tel3", $tel[2]);
        foreach($user->toArray() as $key=>$value){
            $this->set($key, $value);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
     //   $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('削除に成功しました'));
        } else {
            $this->Flash->error(__('削除に失敗しました'));
        }
        return $this->redirect(['action' => '/']);
    }

    public function tenantdelete($id = null)
    {
        $tenant = $this->Tenants->get($id);
        if ($this->Tenants->delete($tenant)) {
            $this->Flash->success(__('削除に成功しました'));
        } else {
            $this->Flash->error(__('削除に失敗しました'));
        }
        return $this->redirect(['action' => '/tenant']);
    }

    public function builddelete($id = null)
    {
        $build = $this->Builds->get($id);
        if ($this->Builds->delete($build)) {
            $this->Flash->success(__('削除に成功しました'));
        } else {
            $this->Flash->error(__('削除に失敗しました'));
        }
        return $this->redirect(['action' => '/build']);
    }





    public function tenant(){
        $user = $this->Auth->user();
        $tenant = $this->ViewTenants->find()->contain(['users']);
        if($this->request->getData("tenantname")){
            $tenant = $tenant->where(["name LIKE " => "%".$this->request->getData( 'tenantname' )."%"]);
        }
        if($this->request->getData("company")){
            $tenant = $tenant->where(["Users.company LIKE " => "%".$this->request->getData( 'company' )."%"]);
        }
        if($this->request->getData("username")){
            $tenant = $tenant->where( ["OR"=>
                [
                    "Users.sei LIKE " => "%".$this->request->getData( 'username' )."%",
                    "Users.mei LIKE " => "%".$this->request->getData( 'username' )."%"
                ]
            ]);
        }
        if($this->request->getData("job")){
            $tenant = $tenant->where(["ViewTenants.job " => $this->request->getData( 'job' )]);
        }

        $tenant = $tenant->order([
            'ViewTenants.roomcount'=>'desc',
            'ViewTenants.created'=>'desc'
        ]);
        $tenant = $this->paginate($tenant);

        $tenant = $this->__setPref($tenant);
        $tenant = $this->__setRentJp($tenant);
        $this->set(compact('tenant'));
        $this->set("compnent",$this->password);
    }

    public function tenantedit($id){
        //テナント更新画面
        $tenant = $this->ViewTenants->find()
            ->where([
                'id'=>$id,
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
                            if($value > 0){
                                $TenantHope = $this->TenantHope->newEntity();
                                $TenantHope->pref = $value;
                                $TenantHope->tenant_id = $tenant->id;
                                $this->TenantHope->save($TenantHope);
                            }
                        }
                        if(!empty($this->request->getData("jobtype"))){
                            foreach($this->request->getData("jobtype") as $key=>$value){
                                foreach($value as $k=>$val){
                                    $TenantJob = $this->TenantJob->newEntity();
                                    $TenantJob->jobtype = $k;
                                    $TenantJob->tenant_id = $tenant->id;
                                    $this->TenantJob->save($TenantJob);
                                }
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


    public function build(){
        $sql = "
            SELECT
                build_id,
                count(build_id) as cnt,
                max(created) as stdate
            FROM (
                SELECT
                    *
                FROM
                    comments
                WHERE
                    tenant_id != 0
                GROUP BY tenant_id,build_id
            ) as a
            GROUP BY build_id
            ";
        $connection = ConnectionManager::get('default');
        $commentCounts = $connection->execute($sql)->fetchAll('assoc');
        $commentCount = [];
        foreach($commentCounts as $key=>$value){
            $commentCount[$value['build_id']][ 'cnt' ] = $value[ 'cnt' ];
            $commentCount[$value['build_id']][ 'stdate' ] = $value[ 'stdate' ];
        }
        $user = $this->Auth->user();
        $builds = $this->Builds->find("all",[
            "order"=>[
                "FIELD(Builds.status,1,6,5,0)",
                "Builds.start DESC",
                "Builds.created DESC ",
            ]
        ])->contain(['users']);
        if($this->request->getData("name")){
            $builds = $builds->where([
                "Builds.name  LIKE "=>"%".$this->request->getData('name')."%"
            ]);
        }
        if($this->request->getData("company")){
            $builds = $builds->where([
                "Users.company LIKE "=>"%".$this->request->getData('company')."%"
            ]);
        }
        if($this->request->getData("username")){
            $builds = $builds->where([
                "OR"=>[
                "Users.sei LIKE "=>"%".$this->request->getData('username')."%",
                "Users.mei LIKE "=>"%".$this->request->getData('username')."%"
                ]
            ]);
        }
        $builds = $this->paginate($builds);


        $this->set(compact('builds'));
        $this->set("commentCount",$commentCount);
        $this->set("compnent",$this->password);

    }


    public function buildregist($id = ""){
        $type = "";
        $error = [];
        $setUploadfile = "";
        $setUploadfilename = "";
        $uploadfile = "";
        if($id){
            $build = $this->Builds->get($id);
            $setUploadfile = $build->uploadfile;
            $setUploadfilename = $build->uploadfilename;
        }else{
            $build = $this->Builds->newEntity();
        }

        //確認画面
        if(
            $this->request->getData("conf") ||
            $this->request->getData("regist")
        ){
            //エラーチェック

            $build = $this->Builds->patchEntity($build, $this->request->getData());
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
                if($this->request->getData("regist")){
                    $build->user_id = $this->Auth->user('id');

                    if(empty($this->request->getData('uploadfile'))){
                       $build->uploadfile = $setUploadfile;
                       $build->uploadfilename = $setUploadfilename;
                    }

                    $this->Builds->save($build);
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
    }

    public function buildfin(){
        $this->autoRender = false;
        $this->Flash->success(__('更新作業を行いました。'));
        return $this->redirect(['action' => '/build']);
    }


}
