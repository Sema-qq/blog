<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', 'photo'], 'string', 'max' => 255],
            [['vk_id'],'unique','targetClass'=>'app\models\User', 'targetAttribute'=>'vk_id']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
            'vk_id' => 'Vk Id',
        ];
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findByUsername($username)
    {
        return User::find()->where(['name'=>$username])->one();
    }

    public static function findByEmail ($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public function validatePassword($password)
    {
        return($this->password == $password) ? true:false;
    }

    public function create()
    {
        return $this->save(false);
    }

    public function saveFromVk($uid, $name, $photo)
    {
        $user = User::find()->where(['vk_id'=>$uid])->one();
        if($user)
        {
            return Yii::$app->user->login($user);
        }
        else
        {
            $this->vk_id = $uid;
            $this->name = $name;
            $this->photo = $photo;
            $this->create();
        }
        return Yii::$app->user->login($this);
    }

    public function getImage()
    {
        return $this->photo;
    }

    public function setPassword($password)
    {
        $this->password = sha1($password);
    }

}

