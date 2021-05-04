<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Password component
 */
class PasswordComponent extends Component
{

    public function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
    //IDの補正
    public function setId($str){
        $string = sprintf("S%08d",$str);
        return $string;
    }

}
