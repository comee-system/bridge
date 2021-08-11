<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $render="";
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->mailsend = $this->loadComponent('MailSend');

        //業種読み込み
        $array_job = Configure::read("array_job");
        $this->set('array_job', $array_job);

        //都道府県読み込み
        $array_prefecture = Configure::read("array_prefecture");
        $this->set('array_prefecture', $array_prefecture);
        $this->loadModel("Tenants");

        //パンくず
        $this->set('crumbs', "on");
        $this->Auth->allow(['add', 'view', 'display', 'fin']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

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
            $this->Flash->error(__('メールアドレス若しくはパスワードに誤りがあります'));
        }
        return $this->redirect("/");
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
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
        if (!empty($this->Auth->user())) {
            return $this->redirect("/mypage/");
        }

        $columns = $this->Users->getSchema()->columns ();
        foreach ($columns as $value) {
            $this->set($value, "");
        }
        $this->set("post1", "");
        $this->set("post2", "");
        $this->set("tel1", "");
        $this->set("tel2", "");
        $this->set("tel3", "");

        $user = $this->Users->newEntity();
        $this->___regist($user);

        $this->set('actionkey', "add");


    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->___regist($user, $id);
        $this->__setUserVariable($user);
        $this->set("actionkey", "edit");
        $this->set("password", "");

        if($this->render){
            $this->render($this->render);
        }else{
            $this->render("add");
        }
        $this->set(compact('user'));

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
     * 会員登録・編集処理
     */
    public  function ___regist($user, $id = "")
    {
        $this->render = "";
        if ($this->request->is('post')) {
            $ref = $this->referer(null, true);
            //patchEntityに入るとvalidationが走る
            if(!$this->request->getData("back")){
                if($id){
                    $user   = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>"edit"]);
                }else{
                    $user   = $this->Users->patchEntity($user, $this->request->getData());
                }
            }
            if(!$this->request->getData("back")) {
                $errors = $user->getErrors();
                $imp    = self::__getErrorMessage($errors);
                if (empty($errors)) {
                    if($this->request->getData("editconf")){
                        $this->render = "addconf";
                        $this->set('actionkey', $this->request->getParam("action")."/".$id);
                        $this->set("id",$id);
                    }else{
                        $this->setPostString($user);
                        $this->setTelString($user);

                        //更新の際、空欄の場合はパスワードを変更しない
                        if($id > 0 && !$this->request->getData('password') ){
                            unset($user->password);
                        }
                        if ($this->Users->save($user)) {
                            if(!$id){
                                $this->mailsend->userRegistrationMail($user);
                            }
                            if($this->request->getParam("action") == "edit"){
                                //インポートされた仮登録データについては、テナントページに遷移する
                                if($user->import == 1){
                                    $tenant = $this->Tenants->find()->where(["user_id"=>$user->id])->first();
                                    return $this->redirect("/mypage/tenantedit/".$tenant->id);
                                }else{
                                    $this->Flash->success(__('会員情報編集が完了しました。'));
                                    return $this->redirect("/mypage/");
                                    exit();
                                }
                            }else{
                                $this->Flash->success(__('会員登録が完了しました。'));
                                return $this->redirect("/users/fin");
                            }
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
        if($this->render) $this->render($this->render);

    }

    /**
     * 会員登録完了 fin
     *
     */
    public function fin()
    {
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
}
