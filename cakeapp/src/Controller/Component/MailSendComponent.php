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
        //制限時間
        $this->limit = date("Y-m-d H:i:s",strtotime("+1 hour"));
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
        $ques->sei = "sei";
        $ques->mei = "mei";
        $ques->campany = "mei";
        $ques->mail = "mei";
        $ques->tel = "mei";
        $ques->note = "mei";
        $ques->created = date('Y-m-d H:i:s');
        $ques->modified = date('Y-m-d H:i:s');
        $this->question->save($ques);
    }

    /***************
     * パスワード再設定用メール
     */
    public function rePassword($user,$token){
        $email = $this->request->getData('email');
        $this->email
        ->template('repassword')
        ->emailFormat('text')
        ->to($email)
        ->from(D_ADMIN_MAIL)
        ->subject("【Bridge】パスワードリセットのご案内")
        ->viewVars([
            'name' => $user->sei.' '.$user->mei,
            'token' => $token,
            'limit' => $this->limit
            ])
        ->send();

        return true;
    }
    public function editPassword($user){
        $email = $user->email;
        $this->email
        ->template('repasswordfin')
        ->emailFormat('text')
        ->to($email)
        ->from(D_ADMIN_MAIL)
        ->subject("【Bridge】パスワード再設定の完了")
        ->viewVars([
            'name' => $user->sei.' '.$user->mei,
            ])
        ->send();

        return true;
    }

}
