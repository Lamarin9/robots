<?php

namespace app\controllers;

use app\models\ProjectMiss;
use app\models\ProjectMissSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectMissController implements the CRUD actions for ProjectMiss model.
 */
class ProjectMissController extends Controller
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
     * Lists all ProjectMiss models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProjectMissSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectMiss model.
     * @param int $id_miss Id Miss
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_miss)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_miss),
        ]);
    }

    /**
     * Creates a new ProjectMiss model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProjectMiss();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_miss' => $model->id_miss]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectMiss model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_miss Id Miss
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_miss)
    {
        $model = $this->findModel($id_miss);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_miss' => $model->id_miss]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectMiss model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_miss Id Miss
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_miss)
    {
        $this->findModel($id_miss)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectMiss model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_miss Id Miss
     * @return ProjectMiss the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_miss)
    {
        if (($model = ProjectMiss::findOne(['id_miss' => $id_miss])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
