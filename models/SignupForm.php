<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['name', 'email', 'password'],'required'],
            [['name'],'string'],
            [['email'],'email'],
            ['password','string', 'min'=>4, 'max'=>10],
            [['email'],'unique','targetClass'=>'app\models\User', 'targetAttribute'=>'email'],
            [['name'],'unique','targetClass'=>'app\models\User', 'targetAttribute'=>'name']
        ];
    }

//    public function signup()
//    {
//        if ($this->validate())
//        {
//            $user = new User();
//            $user->attributes = $this->attributes;
//            return $user->create();
//        }
//    }

    public function signup()
    {
        if ($this->validate())
        {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->setPassword($this->password);
            return $user->create();
        }
    }

}