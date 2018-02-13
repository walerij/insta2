<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $record_id
 * @property string $comment_date
 * @property string $comments_info
 * @property integer $user_id
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'user_id'], 'integer'],
            [['comment_date'], 'safe'],
            [['comments_info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'record_id' => 'Record ID',
            'comment_date' => 'Comment Date',
            'comments_info' => 'Comments Info',
            'user_id' => 'User ID',
        ];
    }
}
