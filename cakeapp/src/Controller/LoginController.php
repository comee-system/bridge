<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->mailsend = $this->loadComponent('MailSend');
        $this->pwd = $this->loadComponent('Password');
        $this->loadModel("Users");
        $this->loadModel("repasswords");


     //  HtmlHelper::addCrumb('Help', '/pages/help/');
    }
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','password','complete','edit']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //ログイン済みの時はトップにリダイレクト
        if($this->Auth->user()){
            return $this->redirect("/");
            exit();
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set('crumbs', "on");
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    /***********
     * パスワード再設定
     */
    public function password() {
        if ($this->request->is('post')) {
            $token = uniqid();
            $email = $this->request->getData("email");
            $user = $this->Users->find('all')->where(['email'=>$email])->first();
            $user->token = $token;

            if ($user->id <= 0) {
                $this->Flash->error(__('登録されているデータがありません'));
            } else {
                $this->mailsend->rePassword($user,$token);
                $user->limitdate = $this->mailsend->limit;
                $this->repasswords->set($user);
                return $this->redirect("/login/complete/?token=".$token);
            }
        }
    }
    /***************
     * password再設定完了
     */
    public function complete(){
        $token = $this->request->query("token");
        $user = $this->repasswords->find('all')->where(['token'=>$token,'status'=>1])->first();
        $this->set('limit', $user->limitdate);
    }
    /**************
     * passwordedit
     */
    public function edit(){
        $now = date('Y-m-d H:i:s');
        $token = $this->request->query("token");
        $user = $this->repasswords->find('all')->where([
            'token' => $token,
            'status' => 1,
            'limitdate' > $now
            ])->first();
        if ($user->id <= 0) {
            $this->Flash->error(__('登録されているデータがありません'));
            return $this->redirect("/login/");
        } else {
            if ($this->request->is(['post'])) {
                $repasswords = $this->repasswords->newEntity();
                $repasswords = $this->repasswords->patchEntity($repasswords, $this->request->getData(),['validate'=>'PasswordEdit']);

                if(!$repasswords->errors()) {
                    $set['password'] = $this->request->getData('password');
                    $users = $this->Users->get($user->users_id, [
                        'contain' => [],
                    ]);
                    $users = $this->Users->patchEntity($users, $set);
                    $this->Users->save($users);
                    //完了メール配信
                    $this->mailsend->editPassword($users);

                    //パスワード変更用テーブルのステータス変更
                    $set = [];
                    $set[ 'status' ] = 0;
                    $repassword = $this->Users->patchEntity($user, $set);
                    $this->Users->save($repassword);
                    $this->render('/Login/editComplete');
                }else{
                    $errorpassword = (!empty($repasswords->errors()[ 'password' ]))?$repasswords->errors()[ 'password' ]:[];
                    $errorpassword_conf = (!empty($repasswords->errors()[ 'password_conf' ]))?$repasswords->errors()[ 'password_conf' ]:[];
                    $message = [];
                    if(count($errorpassword)){
                        foreach($errorpassword as $value){
                            $message[] = $value;
                        }
                    }
                    if(count($errorpassword_conf)){
                        foreach($errorpassword_conf as $value){
                            $message[] = $value;
                        }
                    }
                    $err = implode("<br />",$message);
                    $this->Flash->error($err);
                }
            }
        }
    }
}
