<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Object;
use app\models\ObjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjectController implements the CRUD actions for Object model.
 */
class ObjectController extends AdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Object models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single Object model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Object model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
         $model = new Object();
         $model->file = UploadedFile::getInstance($model, 'file');
         $imageName = "{$model->file}";
         if(!empty($model->file)) {
             $model->file->saveAs('upload/images/products/'.$imageName);
             $model->image = 'upload/images/products/'.$imageName;
         }
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index']);
         } else {
             return $this->render('create', [
                 'model' => $model,
             ]);
         }
     }

     /**
      * Updates an existing Category model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id)
     {
         $model = $this->findModel($id);
         $model->file = UploadedFile::getInstance($model,'file');
            if (!empty($model->file)) {
                $file = $model->file;
                $file->saveAs('upload/images/products/'.$file->baseName.".".$file->extension);
                $model->image = 'upload/images/products/'.$model->file;
            }
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index']);
         } else {
             return $this->render('update', [
                 'model' => $model,
             ]);
         }
     }

    /**
     * Deletes an existing Object model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Object model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Object the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Object::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
