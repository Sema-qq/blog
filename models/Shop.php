<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $id
 * @property string $name
 * @property string $body
 * @property string $dops
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
            [['name','body','dops'], 'required'],
            [['body'], 'string', 'max' => 255],
            [['dops'],'filter','filter'=>'implode']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название автомобиля',
            'body' => 'Кузов',
            'dops' => 'Доп. опции',
        ];
    }
}
