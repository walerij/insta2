<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $link
 * @property string $record_date
 * @property string $record_info
 */
class Records extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['record_date'], 'safe'],
            [['link', 'record_info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'link' => 'Link',
            'record_date' => 'Record Date',
            'record_info' => 'Record Info',
        ];
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(),['record_id'=>'id']);
    }

}
