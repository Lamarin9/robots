<?php

namespace app\controllers;

use app\models\Detail;
use app\models\DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



use yii\web\UploadedFile;
use Yii;
/**
 * DetailController implements the CRUD actions for Detail model.
 */
class DetailController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Detail models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConsult()
    {
        $searchModel = new DetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('consult', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetai($modi)
    {

        
    if (!Yii::$app->user->isGuest) {
        $searchModel = new DetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('detai', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modi' => $modi,
        ]);
    }
    throw new NotFoundHttpException('Страница не найдена');

    }

    /**
     * Displays a single Detail model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Detail();

        if ($this->request->isPost) {

            $model->load($this->request->post());
            $model->icon=UploadedFile::getInstance($model,'icon');
    
            $file_name='/assets/image/' . \Yii::$app->getSecurity()->generateRandomString(50). '.' . $model->icon->extension;
            $model->icon->saveAs(\Yii::$app->basePath. '/web/' . $file_name);
            $model->icon=$file_name;
            $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['site/login']);
            return false;
        } else
            return true;
    }

    /**
     * Updates an existing Detail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Detail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detail::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
