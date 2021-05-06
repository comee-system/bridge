<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Comment Controller
 *
 *
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Comments");
        $this->array_read = Configure::read("array_read");
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function list($id)
    {
        $this->autoRender = false;
        $user = $this->Auth->user();
        if($this->request->is('ajax')) {
            $comments = $this->Comments->find()->where([
                'user_id'=>$user['id'],
                'build_id'=>$id,
                'code'=>1,
                'status'=>1
            ])->order(['id'=>'DESC']);
            $comment = [];
            foreach($comments as $key=>$value){
                $comment[$key]=$value;
                $comment[$key]['readjp'] = $this->array_read[$value['readflag']];
                $comment[$key]['commentsub'] = mb_substr($value['comment'],0,20,"utf-8");
            }
            header('content-type: application/json; charset=utf-8');
            header('Access-Control-Allow-Origin: *');
            echo json_encode($comment, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }
    public function detail($id)
    {


        $this->autoRender = false;
        $user = $this->Auth->user();
        if($this->request->is('ajax')) {

            $comment = $this->Comments->find()->where([
                'user_id != '=>$user['id'],
                'id'=>$id,
            ])->first();
            if(!empty($comment)){
                $comment->readflag = 1;
                $this->Comments->save($comment);
            }
            $comments = $this->Comments->find()->where([
                'user_id'=>$user['id'],
                'id'=>$id,
            ])->first();
            $comments['readjp'] = $this->array_read[$comments['readflag']];

            header('content-type: application/json; charset=utf-8');
            header('Access-Control-Allow-Origin: *');
            echo json_encode($comments, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comment->get($id, [
            'contain' => [],
        ]);

        $this->set('comment', $comment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comment->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comment->patchEntity($comment, $this->request->getData());
            if ($this->Comment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $this->set(compact('comment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comment->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comment->patchEntity($comment, $this->request->getData());
            if ($this->Comment->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $this->set(compact('comment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comment->get($id);
        if ($this->Comment->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
