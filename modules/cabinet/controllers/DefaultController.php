<?php

namespace app\modules\cabinet\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\PasswordForm;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = "main";

    public function behaviors()
    {
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
    public function actions()
    {
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
     * Renders the index view for the module
     * @return string
     */
     public function actionIndex()
     {
         if (Yii::$app->user->isGuest) {
             return $this->redirect(['/login']);
         } elseif (Yii::$app->user->identity->role_id == 2 || Yii::$app->user->identity->role_id == 3) {
             return $this->render('index');
         }
     }

     public function actionLogin()
     {
         if (!Yii::$app->user->isGuest) {
             return $this->render('index');
         } else {
             return $this->redirect(['/login']);
         }
     }

     /**
      * Logout action.
      *
      * @return string
      */
     public function actionLogout()
     {
         Yii::$app->user->logout();

         return $this->redirect(['/login']);
     }

}
