<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public $components = ["Mailsend"];
    public $questions = [];
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Users");
        $this->mailsend = $this->loadComponent('MailSend');
        $this->Auth->allow(['index','conf','fin']);
        $this->user = $this->Auth->user();
    }

    public function index()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            if($this->request->getData('back')){
                $question = $this->Questions->patchEntity($question, $this->request->getData());
            }
            if($this->request->getData('send')){
                $question = $this->Questions->patchEntity($question, $this->request->getData());
                if(!$question->hasErrors()){
                    if ($this->Questions->save($question)) {
                        $this->mailsend->setQuestionMail($this->request->getData());
                        return $this->redirect(['action' => 'fin']);
                    }
                }
            }
        }else{
            $this->set("sei",$this->user[ 'sei' ]);
            $this->set("mei",$this->user[ 'mei' ]);
            $this->set("campany",$this->user[ 'company' ]);
            $this->set("mail",$this->user[ 'email' ]);
            $this->set("tel",$this->user[ 'tel' ]);
        }
        $this->set("question",$question);
    }
    public function conf(){
        if($this->request->is('post')){

            $question = $this->Questions->newEntity();
            if ($this->request->is('post')) {
                $question = $this->Questions->patchEntity($question, $this->request->getData());
                if($question->hasErrors()){
                    $this->set(compact('question'));
                    $this->render("index");
                }
            }
            $this->set(compact('question'));
        }
    }
    public function fin(){


    }


    /*
    public function mailSend(){
        $this->autoRender = false;
        $this->mailsend->sends();
        $this->mailsend->regists();
    }
    */
    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);

        $this->set('question', $question);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $this->set(compact('question'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $this->set(compact('question'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
