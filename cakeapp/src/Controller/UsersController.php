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
            $this->Flash->error(__('Invalid username or password, try again'));
        }
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
    public function add($id = "")
    {
        if ($id > 0) {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
        } else {
            $user = $this->Users->newEntity();
        }
        //        var_dump($user);
        if ($this->request->is('post')) {

            //patchEntityに入るとvalidationが走る
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $errors = $user->getErrors();
            var_dump($errors);
            $errmsg = [];
            if (!empty($errors)) {
                foreach ($errors as $key => $value) {
                    foreach ($value as $k => $val) {
                        $errmsg[] = $val;
                    }
                }
                $imp = implode("<br />", $errmsg);
            }
            if (empty($errors)) {
                //入力値を1つにする
                $user->post = sprintf(
                    "%s-%s",
                    $this->request->getData('post1'),
                    $this->request->getData('post2')
                );

                //入力値を1つにする
                $user->tel = sprintf(
                    "%s-%s-%s",
                    $this->request->getData('tel1'),
                    $this->request->getData('tel2'),
                    $this->request->getData('tel3')
                );
                $user->username = "usernameq";
                $user->role = "sample";

                if ($this->Users->save($user)) {
                    $this->mailsend->userRegistrationMail($user);
                    $this->Flash->success(__('会員登録が完了しました。'));
                    return $this->redirect("/users/fin");
                } else {
                    $this->Flash->error(__('会員登録に失敗しました。'));
                }
            }
            $this->Flash->error(__('会員登録に失敗しました。<br />' . $imp));
        }

        $this->set(compact('user'));

        foreach ($this->request->getData() as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * 会員登録完了 fin
     *
     */
    public function fin()
    {
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
