<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;
use RuntimeException;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeetingController extends AppController
{
    public $paginate = [
        'limit' => 30,
    ];
    public function initialize()
    {
        parent::initialize();
        //レイアウトの指定
        $this->viewBuilder()->setLayout('Admin/default');

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
        $this->uploadfile = "";

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
        $this->array_read = Configure::read("array_read");
        $this->array_code = Configure::read("array_code");
        $this->array_comment_reply_status = Configure::read("array_comment_reply_status");

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
        $this->set("array_read",$this->array_read);
        $this->set("array_comment_reply_status",$this->array_comment_reply_status);

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $user = $this->Auth->user();
        $builds = $this->Builds->find()->contain(['users']);
        if($this->request->getData("name")) $builds = $builds->where(['name LIKE'=>'%'.$this->request->getData("name").'%']);
        if($this->request->getData("company")) $builds = $builds->where(['company LIKE'=>'%'.$this->request->getData("company").'%']);
        if(strlen($this->request->getData("build_status")) > 0) $builds = $builds->where(['build_status LIKE'=>$this->request->getData("build_status")]);
        $builds = $this->paginate($builds);

        $this->set(compact('builds'));
        $this->set("compnent",$this->password);

    }

    public function detail($id = "",$sel = "")
    {
        $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();

        if($this->request->is('ajax')){
            //ステータスの変更
            $build = $this->Builds->find()->where(['id'=>$id])->first();
            $build->build_status = $sel;
            $this->Builds->save($build);
            exit();
        }

        //物件コメント取得
        $buildcomment = $this->Comments->find()->where([
            'build_id'=>$builds['id'],
            'code'=>1,
            'status'=>1
            ])->order(["id"=>"DESC"])->first();

        //テナント用コメント


        $query = $this->Comments->find();
        $query
            ->select(['role_max' =>  $query->func()->max('id')])
            ->where([
            'build_id'=>$builds['id'],
            'code'=>2,
            'status'=>1
            ])
            ->group(["tenant_id"]);
        $tenantcomment = $this->Comments->find()
            ->contain(['tenants'])
            ->where([
            'Comments.id IN '=>$query
            ])->toArray();
        $tenantlist = [];
        foreach($tenantcomment as $key=>$value){
            $tenantlist[] = $value['Tenants']['user_id'];
        }
        if(count($tenantlist)){
            $user = $this->Users->find()
                ->select([
                    'id',
                    'sei',
                    'mei',
                    'company'
                    ])
                ->where([
            'id IN '=> $tenantlist])->toArray();
            $userlist = [];
            foreach($user as $value){
                $userlist[$value->id]['company'] = $value['company'];
                $userlist[$value->id]['name'] = $value['sei'].$value['mei'];
            }
            foreach($tenantcomment as $key=>$value){
                $tenantcomment[$key][ 'usercompany' ]= $userlist[$value['Tenants']['user_id']]['company'];
                $tenantcomment[$key][ 'username' ]= $userlist[$value['Tenants']['user_id']]['name'];
            }
        }
        $this->set(compact('builds'));
        $this->set(compact('buildcomment'));
        $this->set(compact('tenantcomment'));
        $this->set("compnent",$this->password);
        $this->set("build_id",$id);
    }
    public function address($id = ""){
        $tenants = $this->Tenants->find();
        $tenants = $tenants
            ->contain(['users'])
            ->order(["Tenants.id"=>"DESC"]);
        $tenants = $this->paginate($tenants);
        //コメント情報取得
        $comment = $this->Comments->find();
        $comment = $comment
            ->select([
                'count'=>$comment->func()->count('Comments.id'),
                'tenant_id'
                ])
            ->where(['build_id'=>$id,'status'=>1])
            ->group(['tenant_id'])->toArray();
        $this->set(compact('tenants'));
        $this->set("build_id",$id);
        $this->set("commentCount",self::_getCommentCount($comment));

    }
    public static function _getCommentCount($comment=[]){
        $list = [];
        if(count($comment) > 0 ){
            foreach($comment as $key=>$value){
                $list[$value['tenant_id']]['count'] = $value[ 'count' ];
            }
        }
        return $list;
    }
    public function message($id = ""){
        //物件情報
        $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();

        //登録処理
        if($this->request->getData("regist")){
            $cnt = 0;
            foreach($this->request->getData('tenant_id') as $key=>$value){
                $user_id = $this->request->getData("user_id")[$key];
                $this->regist("tenant",$id,$value,$cnt,$user_id,false);
                $cnt++;
            }
            return $this->redirect(['action' => 'detail/'.$id]);
            exit();
        }

        if(empty($this->request->getData("select"))){
            return $this->redirect(['action' => "../meeting/address/".$id]);
        }
        $tenants = $this->Tenants->find()->contain(['users'])->where(['Tenants.id IN' => $this->request->getData("select")]);

        $this->set(compact('tenants'));
        $this->set(compact('builds'));
        $this->set("build_id",$id);

    }
    //id=build_id or tenant_id
    public function room($code = "",$id="",$tenant_id=""){
        $builds = [];
        if($code == "build"){
            //物件コメント取得
            $comment = $this->Comments->find()
                ->where([
                    'code'=>array_keys($this->array_code,$code)[0],
                    'build_id'=>$id
                ])
                ->order(["id"=>"DESC"]);
            $toArray = $comment->toArray();
            if(empty($toArray)) $toArray[0][ 'build_id' ] = $id;

        }else{
            //テナントコメント取得
            $comment = $this->Comments->find()
            ->contain(['builds'])
            ->where([
                'code'=>array_keys($this->array_code,$code)[0],
                'tenant_id'=>$tenant_id,
                'build_id'=>$id
            ])
            ->order(["Comments.id"=>"DESC"]);
            $toArray = $comment->toArray();
            if(empty($toArray)) $toArray[0][ 'build_id' ] = $id;
        }
        $comment = $this->paginate($comment);
        $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();
        //管理者以外のコメントを既読
        foreach($comment as $key=>$value){
            if($value->response == 2){
                $com = $this->Comments->get($value->id, [
                    'contain' => [],
                ]);
                $com->readflag = 1;
                $this->Comments->save($com);
            }
        }

        $this->set(compact('builds'));
        $this->set(compact('comment'));
        $this->set("compnent",$this->password);
        $this->set("id",$id);
        $this->set("tenant_id",$tenant_id);
        $this->set("code",$code);

    }
    public function regist($code = "",$id="",$tenant_id = 0,$cnt = 0,$user_id=0,$redirect = true){
        $this->autoRender = false;
        $user = [];
        if($user_id){
            $user = $this->Users->find()->where(["id"=>$user_id])->first();
        }else{
            $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();
            $user_id = $builds['user_id'];
            $user = $this->Users->find()->where(["id"=>$user_id])->first();
        }
        if($this->request->getData("regist")){

            if($this->request->getData('fileupload.name') && $cnt == 0){
                $dir = realpath(WWW_ROOT . "/upload");
                $limitFileSize = 1024 * 1024;
                try {
                    $this->uploadfile = $this->Upload->file_upload($this->request->getData('fileupload'), $dir, $limitFileSize);

                } catch (RuntimeException $e){
                    $this->Flash->error(__('ファイルのアップロードができませんでした.'));
                    $this->Flash->error(__($e->getMessage()));
                }
            }

            $comments = $this->Comments->newEntity();
            $comments = $this->Comments->patchEntity($comments, $this->request->getData(),['validate'=>false]);

            $comments->response = 1; //1:admin 2:user
            $comments->code = array_keys($this->array_code,$code)[0]; //1.build 2.tenant
            $comments->build_id = $id;
            if($tenant_id > 0) $comments->tenant_id = $tenant_id;
            $comments->user_id = $user_id;
            $comments->file = $this->uploadfile;
            $comments->filename = $this->request->getData('fileupload')['name'];

            $this->Comments->save($comments);

            //メール配信
            $this->mailsend->setCommentMail($user);

            if($cnt == 0){
                $this->Flash->success(__('コメントを登録しました'));
            }
            if($redirect && $tenant_id){
                return $this->redirect(['action' => 'room/'.$code."/".$id."/".$tenant_id]);
            }
            if($redirect){
                return $this->redirect(['action' => 'room/'.$code."/".$id]);
            }

        }

    }




}
