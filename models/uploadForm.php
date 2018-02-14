<?php

namespace app\models;


use Yii;
use yii\base\Model;

class uploadForm extends Model {

    public $file;
    public $info;

    public function rules() {
        return [
            // username and password are both required

            [['file'], 'file', 'extensions' => 'png, jpg',
                'skipOnEmpty' => false              
                ],
            ['info','string'],
            ['info','required'],
            ];
            
        
    }

}
