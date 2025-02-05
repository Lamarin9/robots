<?php

namespace app\controllers;

use app\models\Project;
use app\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\ProjectConsultSearch;
use yii\db\Command;
use yii\db\Expression;
use Yii;
/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
     * Lists all Project models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 2;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConsult()
    {
        $searchModel = new ProjectConsultSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 2;
        
        return $this->render('consult', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
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
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    
    public function actionCreate()
    {
        $model = new Project();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->icon=UploadedFile::getInstance($model,'icon');
            $file_name='assets/image/' . \Yii::$app->getSecurity()->generateRandomString(50). '.' . $model->icon->extension;
            $model->icon->saveAs(\Yii::$app->basePath .'/web/'. $file_name);
            $model->icon = $file_name;
            if ($model->save(false)) {
                return $this->redirect(["view","id"=> $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost){ $post = $this->request->post();
            unset($post['Project'] ['icon']);
            $model->load($post);
            $model->save();
            $file=UploadedFile::getInstance($model,'icon');
            if ($file ){
                $file_name='assets/image/' . \Yii::$app->getSecurity()->generateRandomString(50). '.' . $file->extension;
                $file->saveAs(\Yii::$app->basePath .'/web/'. $file_name);
                $model->icon = $file_name;
                
            }
            if ($model->save(false)) {
                return $this->redirect(["view","id"=> $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Project model.
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionClose($id)
    {


        if (!Yii::$app->user->isGuest)
        {if (Yii::$app->user->identity->isAdmin())
            {

        if (($model = Project::findOne(['id' => $id])) !== null ) {
            if (!$model->date_close){
                $model->date_close =  new Expression('NOW()');
                $model->save();
            } else {
                Yii::$app->session->setFlash('error', 'Проект уже завершен');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }
    }
    }
}
