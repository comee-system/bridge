<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
/**
 * MailSend component
 */
class MailSendComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function initialize(array $config)
    {

        $this->email = new Email('default');
        $this->question = TableRegistry::getTableLocator()->get("questions");
    }
    public function sends(){
        $this->email
        ->template('welcome', 'fancy')
        ->emailFormat('text')
        ->to('chiba@innovation-gate.jp')
        ->from('app@domain.com')
        ->subject("ssssss")
        ->viewVars(['name' => 12345])
        ->send();

    }
    public function regists(){
        $ques = $this->question->newEntity();
        //サンプルデータですrequestを渡すようにしてください
        $ques->sei= "sei";
        $ques->mei= "mei";
        $ques->campany= "mei";
        $ques->mail= "mei";
        $ques->tel= "mei";
        $ques->note= "mei";
        $ques->created= date('Y-m-d H:i:s');
        $ques->modified= date('Y-m-d H:i:s');
     //   $question = $this->question->patchEntity($question, $sample);
      //  $question = $this->Questions->patchEntity($question, $this->request->getData());
        $this->question->save($ques);
    }

}
