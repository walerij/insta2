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

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Здесь и далее - работа с записями.
     *
     * @return 
     */
    private function getUser() {
        $session = Yii::$app->session; //получение текущей сессии
        //вычисление текущего пользователя
        $user_current = User::find()->where(['id' => $session['__id']])->all();

        return $user_current;
    }
   private function getUserPage() {
        $session = Yii::$app->session; //получение текущей сессии
        //вычисление текущего пользователя
        $user_current = User::find()->where(['id' => $session['__id']])->all();

        return $user_current;
    }
    /**
     * Вывод всех записей текушего пользователя
     *
     * @return string
     */
    public function actionAllrecord() { //вывод всех записей текущего пользователя


        //вычисление текущего пользователя
        $user_current = $this->getUser();


        return $this->render('records\index', ['model' => $user_current,
                    'path' => dirname(Yii::$app->basePath)]);
    }

    /*     * Добавление новой записи
     *
     * @return string
     */

    public function actionAddrecord() {
        $model = new UploadForm();
        $RecordsRec = new Records();
        $user_current = $this->getUser();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
           
            if ($model->validate()) {
                $path = Yii::$app->params['pathUploads'] . 'img/records/';
                
                $picture = 'pic_1_1_' . time() . '.' . $model->file->getExtension();
                $model->file->saveAs($path . $picture);
                
                foreach ($user_current as $usercurrent)
                    $RecordsRec->user_id = $usercurrent->id; //запишем id пользователя
                $RecordsRec->link = $picture; //запомнили картинку в модель Записи
                $RecordsRec->record_info = $model->info; //азпишем информацию
                $RecordsRec->record_date = date('Y-m-d H:i:s'); //запишем дату

                $RecordsRec->save(); //сохраним в БД
                return $this->redirect('/site/allrecord'); //переадресуемся на вывод всех записей
            }
        }
        return $this->render('records\addrecord', ['model' => $model]);
    }

}
