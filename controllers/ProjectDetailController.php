<?php

namespace app\controllers;

use app\models\ProjectDetail;
use app\models\ProjectDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Detail;
use Yii;

/**
 * ProjectDetailController implements the CRUD actions for ProjectDetail model.
 */
class ProjectDetailController extends Controller
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
     * Lists all ProjectDetail models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProjectDetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectDetail model.
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
     * Creates a new ProjectDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProjectDetail();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAdd($mobi, $modi )
    {
        $det = Detail::find()->where(['id' => $mobi,])->one();
        $pr_det = ProjectDetail::find()->where(['detail_id' => $mobi, 'project_id' => $modi ])->one();
        if ($pr_det){
            $pr_det->count += 1;
            $det->count--;
            $det->save(false);
        }
        else{
            $model = new ProjectDetail();
            $model->project_id = $modi;
            $model->detail_id = $mobi;
            $model->count = 1;
            
            $model->save(false);
            return $this->redirect(['/project/view', 'id' => $model->project_id]);
        }       
        if ($pr_det->save(false)) {
            Yii::$app->session->setFlash('success', 'Деталь добавлена');
        } else {
            Yii::$app->session->setFlash('error', 'Не удалось добавить деталь.');
        }
        return $this->redirect(['/project/view', 'id' => $pr_det->project_id]);
    }

    /**
     * Updates an existing ProjectDetail model.
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
     * Deletes an existing ProjectDetail model.
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
     * Finds the ProjectDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProjectDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectDetail::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
