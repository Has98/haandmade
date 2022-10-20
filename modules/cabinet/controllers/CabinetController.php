<?php
namespace app\modules\Cabinet\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

/**
 * Class CabinetController
 * @package app\models\cabinet\controllers
 */
 class CabinetController extends Controller
 {
     public $layout = "main";

     public function beforeAction($action)
     {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->role_id != 2 && Yii::$app->user->identity->role_id != 3)) {
            return $this->redirect(['/login']);
        } else {
            return true;
        }
     }

     public function init() {
         parent::init();
         return true;
     }
 }
