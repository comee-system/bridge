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
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
       // $this->Auth->allow('top');
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


    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }



}
