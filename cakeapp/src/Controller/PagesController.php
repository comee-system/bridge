<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public $components = ["MailSend"];
    public $questions = [];
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadModel("Users");
        $this->loadModel("Questions");

        $this->array_prefecture = Configure::read("array_prefecture");
        $this->set('array_prefecture', $this->array_prefecture);

        $this->mailsend = $this->loadComponent('MailSend');
        //$this->Auth->allow(['index','conf','fin']);
        //$this->user = $this->Auth->user();

        $this->Auth->allow('top');
        $this->user = $this->Auth->user();

    }

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function top(){

        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            if($this->request->getData('back')){
                $question = $this->Questions->patchEntity($question, $this->request->getData());
            }
            if($this->request->getData('send')){
                $question = $this->Questions->patchEntity($question, $this->request->getData());
                if(!$question->hasErrors()){
                    if ($this->Questions->save($question)) {
                        $this->mailsend->setQuestionMail($this->request->getData(),$this->array_prefecture);
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

}
