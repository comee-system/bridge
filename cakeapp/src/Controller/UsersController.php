<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
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
        $array_job = Configure::read("array_job");
        $this->set('array_job', $array_job);

        $this->Auth->allow(['add', 'view', 'display']);
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
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->post = sprintf("%s-%s"
                ,$this->request->getData('post1')
                ,$this->request->getData('post2')
            );

            $user->tel = sprintf("%s-%s-%s"
                ,$this->request->getData('tel1')
                ,$this->request->getData('tel2')
                ,$this->request->getData('tel3')
            );

            if ($this->Users->save($user)) {
                $this->Flash->success(__('会員登録が完了しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));

        $this->set('sei', $this->request->getData('sei'));
        $this->set('mei', $this->request->getData('mei'));
        $this->set('sei_kana', $this->request->getData('sei_kana'));
        $this->set('mei_kana', $this->request->getData('mei_kana'));
        $this->set('company', $this->request->getData('company'));
        $this->set('post1', $this->request->getData('post1'));
        $this->set('post2', $this->request->getData('post2'));
        $this->set('prefecture', $this->request->getData('prefecture'));
        $this->set('city', $this->request->getData('city'));
        $this->set('space', $this->request->getData('space'));
        $this->set('build', $this->request->getData('build'));
        $this->set('busyo', $this->request->getData('busyo'));
        $this->set('tel1', $this->request->getData('tel1'));
        $this->set('tel2', $this->request->getData('tel2'));
        $this->set('tel3', $this->request->getData('tel3'));
        $this->set('email', $this->request->getData('email'));
        $this->set('password', $this->request->getData('password'));

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
