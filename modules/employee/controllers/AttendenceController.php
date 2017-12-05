<?php

namespace app\modules\employee\controllers;

use app\modules\account\models\Employee;
use Yii;
use app\modules\employee\models\Attendence;
use app\modules\employee\models\AttendenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AttendenceValue;

/**
 * AttendenceController implements the CRUD actions for Attendence model.
 */
class AttendenceController extends Controller
{
    public $layout = '@app/modules/account/views/layouts/admin';
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
     * Lists all Attendence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttendenceSearch();
        $data =  Attendence::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
        ]);
    }

    /**
     * Displays a single Attendence model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $employees = Employee::find()->select(['id'])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'employees'=>$employees
        ]);
    }

    /**
     * Creates a new Attendence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attendence();
        $payload = array();
        $employees = Employee::find()->select(['id','first_name','last_name'])->all();

        if ($post = Yii::$app->request->post()) {
            $date = @$post['date'];
            $bool_exist = Attendence::find()
                ->where( [ 'date' => $date ] )
                ->exists();
            if($date == date("Y-m-d") &&  !$bool_exist ){
                foreach ($employees  as $employee) {
                    $id = @$post[$employee->id];
                    if ($id == NULL)
                        $id = "0";
                    $attendence_value = new AttendenceValue();
                    $attendence_value->employee_id = $employee->id;
                    $attendence_value->setValue($id);
                    array_push($payload,$attendence_value);
                }
                $model->attendence = json_encode($payload);
                $model->date = ($date == NULL) ? date('Y-m-d') : $date;
                if($model->save(false))
                    return $this->redirect(['view', 'id' => $model->id]);
                else
                    return $this->goBack();
            }else{
                return $this->goBack();
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'employees'=>$employees
            ]);
        }
    }

    /**
     * Updates an existing Attendence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $payload = array();
        $employees = json_decode($model->attendence);
        if ($post = Yii::$app->request->post()) {
            $date = @$post['date'];
            foreach ($employees  as $employee) {
                $id = @$post[$employee->employee_id];
                if ($id == NULL)
                    $id = "0";
                $attendence_value = new AttendenceValue();
                $attendence_value->employee_id = $employee->employee_id;
                $attendence_value->setValue($id);
                array_push($payload,$attendence_value);
            }
            $model->attendence = json_encode($payload);
            $model->date = ($date == NULL) ? date('Y-m-d') : $date;
            if($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->goBack();
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'employees'=>$employees
            ]);
        }
    }

    /**
     * Deletes an existing Attendence model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Attendence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attendence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attendence::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
