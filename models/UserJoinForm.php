<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15.02.2018
 * Time: 22:10
 */

namespace app\models;

use Yii;
use yii\base\Model;

class UserJoinForm extends Model{

    public $username;
    public $password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['username','password'],'required'],

            ['password','string','min'=>6, 'message'=>'Маловато будет символов в пароле'],
            ['confirm_password','compare','compareAttribute'=>'password','message'=>'пароли не равны'],

        ];
    }

    public function setUserRecord($userrecord)
    {
        $this->username = $userrecord->username;

        $this->password = $userrecord->password;
    }
}