<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    //обьявлени переменных
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    // правила валидации для полей формы обратной связи
    public function rules()
    {
        return [
            // поля обязательные для заполнения
            [['name', 'email', 'subject', 'body'], 'required'],
            // емейл это емейл
            ['email', 'email'],
            // проверка капчи
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Подтвердите код',
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'subject' => 'Тема',
            'body' => 'Сообщение',
        ];
    }

    // функция отправки письма на почту
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email) //от кого
                ->setFrom([$this->email => $this->name]) //куда
                ->setSubject($this->subject) //имя отправителя
                ->setTextBody($this->body) //текст сообщения
                ->send(); //функция отправки письма

            return true;
        }
        return false;
    }
}
