<?php

namespace app\modules\employee\controllers;

use Yii;
use app\modules\employee\models\LeaveNotice;
use app\modules\employee\models\LeaveNoticeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * LeaveNoticeController implements the CRUD actions for LeaveNotice model.
 */
class LeaveNoticeController extends Controller
{
    public $layout = "@app/modules/account/views/layouts/admin";
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
     * Lists all LeaveNotice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeaveNoticeSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data =  LeaveNotice::find()->where(['in','status',[1,2]])->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
        ]);
    }

    /**
     * Displays a single LeaveNotice model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $days = $model->leave_days-1;
        $end_date = date("Y-m-d", strtotime( $days."day", strtotime($model->start_date)));
        return $this->render('view', [
            'model' => $model,
            'end_date' => $end_date
        ]);
    }

    /**
     * Creates a new LeaveNotice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LeaveNotice();
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            $model->file = 'uploads/' . $file->baseName . '.' . $file->extension;
            $model->apply_date=date('Y-m-d');
            if ($model->save()) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LeaveNotice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            $model->file = 'uploads/' . $file->baseName . '.' . $file->extension;
            if ($model->save()) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LeaveNotice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $id =$_POST['id'];
        $model=$this->findModel($id);
        $model->status=0;
        $model->save(false);
        return $this->redirect(['index']);
    }

    /**
     * Finds the LeaveNotice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LeaveNotice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LeaveNotice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
