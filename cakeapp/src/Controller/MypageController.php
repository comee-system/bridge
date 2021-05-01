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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class MypageController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $array_status = Configure::read("array_status");
        $array_prefecture = Configure::read('array_prefecture');
        $array_shop = Configure::read('array_shop');
        $array_agreement = Configure::read('array_agreement');
        $array_build = Configure::read('array_build');
        $array_constract = Configure::read('array_constract');
        $array_floor = Configure::read('array_floor');
        $array_rent_money = Configure::read('array_rent_money');
        $array_space_money = Configure::read('array_space_money');
        $array_job = Configure::read('array_job');
        $array_sub = Configure::read('array_sub');
        $array_job_type = Configure::read('array_job_type');
        $this->set("array_status",$array_status);
        $this->set("array_prefecture",$array_prefecture);
        $this->set("array_shop",$array_shop);
        $this->set("array_agreement",$array_agreement);
        $this->set("array_build",$array_build);
        $this->set("array_constract",$array_constract);
        $this->set("array_floor",$array_floor);
        $this->set("array_rent_money",$array_rent_money);
        $this->set("array_space_money",$array_space_money);
        $this->set("array_job",$array_job);
        $this->set("array_sub",$array_sub);
        $this->set("array_job_type",$array_job_type);
    }

    /**
     * Displays a index
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function index(){


    }
    public function buildlist(){

    }
    public function buildregist(){

        $type = "";
        //確認画面
        if($this->request->getData("conf")){

            $type = "conf";
        }
        //登録完了
        if($this->request->getData("regist")){
            $type = "fin";
        }
        $this->set("type",$type);
    }
    public function room(){


    }
    public function staff(){

        $this->render("room");
    }
    public function message($id){

        $this->render("room");
    }

    public function tenant(){

    }
    public function tenantregist(){

        $type = "";
        $button = "確認する";
        $buttonname = "conf";
        //確認画面
        if($this->request->getData("conf")){

            $button = "登録する";
            $buttonname = "regist";
            $type = "conf";
        }
        //登録完了
        if($this->request->getData("regist")){
            $type = "fin";
        }

        $this->set("type",$type);
        $this->set("button",$button);
        $this->set("buttonname",$buttonname);
    }
}
