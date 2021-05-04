<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public $paginate = [
        'limit' => 30,
    ];
    public function initialize()
    {
      parent::initialize();
      $this->loadModel("Tenants");
      $this->loadModel("TenantJob");
      $this->loadModel("TenantHope");
      $this->loadModel("Builds");

      $this->mailsend = $this->loadComponent('MailSend');

      $this->array_prefecture = Configure::read("array_prefecture");
      //レイアウトの指定
      $this->viewBuilder()->setLayout('Admin/default');
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

    public function import(){
        if ($this->request->is('post')) {
            $file = $this->request->getData('file');
            if(!$file['tmp_name']){
                $this->Flash->error('ファイルが確認できませんでした。');
                return $this->redirect(['action' => 'import']);
            }

            //CSVアップロード
            $filePath = WWW_ROOT.'/import/' . date("YmdHis") . $file['name'];
            move_uploaded_file($file['tmp_name'], $filePath);
            $f = fopen($filePath, "r");
            $csvData = [];
            while($line = fgetcsv($f)){
                $csvData[] = $line;
            }
            $connection = ConnectionManager::get('default');
            $connection->begin();
            $err_row = [];
            $mail = [];
            $errmsg = [];
            try {
                foreach($csvData as $key=>$value){
                    if($key > 0){
                        $user = $this->Users->newEntity();
                        $data = [];
                        $data['sei'  ] = $value[0];
                        $data['company'  ] = $value[1];
                        $data['post'  ] = $value[2];
                        $data['prefecture'  ] = array_search($value['3'],$this->array_prefecture);
                        $data['city'] = $value[4];
                        $data['space'] = $value[5];
                        $data['build'] = $value[6];
                        $data['busyo'] = $value[7];
                        $data['tel'] = $value[8];
                        $data['email'] = $value[9];
                        $data['password'] = $value[10];
                        $data['import'] = 1;
                        //メール送信データ
                        $mail[$key]['text'] = $value[11];
                        $mail[$key]['email'] = $value[9];
                        $mail[$key]['name'] = $value[0];

                        $user   = $this->Users->patchEntity($user, $data,["validate"=>"import"]);
                        //var_dump($user->getErrors()[ 'email' ]);
                        $err = $user->getErrors();
                        if(isset($err['email']['custom']) ) $errmsg[] = $key."行目. ".$err['email']["custom"];
                        if(isset($err['email']['email']) ) $errmsg[] = $key."行目. ".$err['email']["email"];
                        if($user->getErrors()){
                            $err_row[] = 1;
                        }else{
                            $user->import = 1;
                            $this->Users->save($user);
                            $tenant = $this->Tenants->newEntity();
                            $tenant->user_id = $user->id;
                            $tenant->name = $value[12];
                            $tenant->floor = $value[13];
                            $tenant->min_floor = $value[14];
                            $tenant->max_floor = $value[15];
                            $tenant->rent_money_min = $value[16];
                            $tenant->rent_money_max = $value[17];
                            $this->Tenants->save($tenant);
                            $err_row[] = 0;
                        }
                    }
                }


            }catch(\Exception $e){
                //echo "error";
                //$connection->rollback();
                //exit();
                $err_row[] = 1;
            }
            if(array_sum($err_row)){
                $imp = implode("<br />",$errmsg);
                $this->Flash->error('データのインポートに失敗しました。<br />'.$imp);

                $connection->rollback();
            }else{
                //メール配信
                foreach($mail as $key=>$value){
                    $this->mailsend->userImportMail($value);
                }
                $this->Flash->success(__('データのインポートに成功しました。'));
                $connection->commit();
            }
            return $this->redirect(['action' => 'import']);

        }
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
            $user = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>false]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
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
