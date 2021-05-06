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

        $builds = $this->paginate($builds);

        $this->set(compact('builds'));
        $this->set("compnent",$this->password);

    }

    public function detail($id = "")
    {
        $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();

        //物件コメント取得
        $buildcomment = $this->Comments->find()->order(["id"=>"DESC"])->first();
        $this->set(compact('builds'));
        $this->set(compact('buildcomment'));
        $this->set("compnent",$this->password);
        $this->set("build_id",$id);
    }
    public function address($id = ""){

    }
    public function message($id = ""){

    }
    //id=build_id or tenant_id
    public function room($code = "",$id=""){
        $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();

        if($code == "build"){
            //物件コメント取得
            $comment = $this->Comments->find()
                ->where([
                    'code'=>array_keys($this->array_code,$code)[0],
                    'build_id'=>$id
                ])
                ->order(["id"=>"DESC"]);
        }else{
            //テナントコメント取得
            $comment = $this->Comments->find()
            ->where([
                'code'=>array_keys($this->array_code,$code)[0],
                'tenant_id'=>$id
            ])
            ->order(["id"=>"DESC"]);
        }
        $comment = $this->paginate($comment);

        $this->set(compact('builds'));
        $this->set(compact('comment'));
        $this->set("compnent",$this->password);
        $this->set("id",$id);
        $this->set("code",$code);

    }
    public function regist($code = "",$id=""){
        $this->autoRender = false;
        $builds = $this->Builds->find()->contain(['users'])->where(['Builds.id'=>$id])->first();
        if($this->request->getData("regist")){
            if($this->request->getData('fileupload')){
                $dir = realpath(WWW_ROOT . "/upload");
                $limitFileSize = 1024 * 1024;
                try {
                $uploadfile = $this->Upload->file_upload($this->request->getData('fileupload'), $dir, $limitFileSize);

                } catch (RuntimeException $e){
                    $this->Flash->error(__('ファイルのアップロードができませんでした.'));
                    $this->Flash->error(__($e->getMessage()));
                }
            }

            $comments = $this->Comments->newEntity();
            $comments = $this->Comments->patchEntity($comments, $this->request->getData());
            $comments->response = 1; //1:admin 2:user
            $comments->code = array_keys($this->array_code,$code)[0]; //1.build 2.tenant
            if($code == "build"){
                $comments->build_id = $id;
            }else{
                $comments->tenant_id = $id;
            }
            $comments->user_id = $builds->user_id;
            $comments->file = $uploadfile;
            $comments->filename = $this->request->getData('fileupload')['name'];
            $this->Comments->save($comments);
            $this->Flash->success(__('コメントを登録しました'));
            return $this->redirect(['action' => 'room/'.$code."/".$id]);
        }

    }




}
