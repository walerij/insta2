<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\Records;
use app\models\ContactForm;
use yii\web\UploadedFile;
use app\models\UploadForm;

class CommentsController extends Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
}

