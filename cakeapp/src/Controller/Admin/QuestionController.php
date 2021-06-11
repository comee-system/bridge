<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;


/**
 * Question Controller
 *
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public $paginate = [
        'limit' => 30,
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadModel("Questions");
        $this->viewBuilder()->setLayout('Admin/default');
        $this->array_prefecture = Configure::read("array_prefecture");
        $this->set('array_prefecture', $this->array_prefecture);
    }
    public function index()
    {
        $questions = $this->Questions->find();
        if($this->request->getData("date")){
            $questions = $questions->where([
                "created LIKE " => preg_replace("/\//","-",$this->request->getData("date"))."%"
            ]);
        }
        $questions = $questions->order(["id"=>"desc"]);
        $questions = $this->paginate($questions);

        $this->set(compact('questions'));
    }

    /**
     * View method
     *
     * @param string|null $id question id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);
        $this->set('question', $question);
      //  $this->set(compact('questions'));
    }
    /**
     * Delete method
     *
     * @param string|null $id question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Question->get($id);
        if ($this->Question->delete($question)) {
            $this->Flash->success(__('The admin/question has been deleted.'));
        } else {
            $this->Flash->error(__('The admin/question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
