<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

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
    }
    public function index()
    {
        $questions = $this->Questions->find()->order(["id"=>"desc"]);
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
