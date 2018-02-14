<?php

namespace app\controllers;

use app\models\LessonRecord;
use Yii;
use app\models\CourseRecord;
use app\models\AdminCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use app\models\UploadForm;

/**
 * AdmincourseController implements the CRUD actions for CourseRecord model.
 *
 *
 *
 * Влад
Спасибо за статью! А переменную Yii::$app->params[‘pathUploads’] — где устанавливать?
on 16.11.2016 Ответить
admin
В файле config/params.php
Полный код файла:
< ?php
return [
‘adminEmail’ => ‘admin@example.com’,
‘pathUploads’ => realpath(dirname(__FILE__)).’\..\web\img\user_photo\\’,
];
Вместо «realpath(dirname(__FILE__)).’\..\web\img\user_photo\\» указать необходимый путь
 *
 *
 *
 */
class UploadController extends Controller {

    public function actionIndex() {
        $model = new UploadForm();
        if (Yii::$app->request->post()) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                $path = Yii::$app->params['pathUploads'] . 'img/records/';
                //$model->file->saveAs($path . $model->file);
                $model->file->saveAs($path .'pic_1_1_'.time().'.'. $model->file->getExtension());
              //  $model->path= $path .time().'.'. $model->file->getExtension();
            }
        }
        return $this->render('index', ['model' => $model]);
    }


}
