<?php

namespace app\modules\account\controllers;

use app\component\Helper;
use app\models\Balance;
use app\models\RefId;
use Yii;
use app\modules\account\models\ExpensesSearch;
use app\modules\account\models\Expenses;
use app\modules\account\models\Voucher;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;


/**
 * ExpensesController implements the CRUD actions for Expenses model.
 */
class ExpensesController extends Controller
{
    public $layout = 'admin';
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
     * Lists all Expenses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpensesSearch();
        $model = new Expenses();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = Expenses::find()->where(['in','status',[1,2]])->all();
       // var_dump($data);exit;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Expenses model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Expenses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Expenses();
        $ref_id = new RefId();
        $bal_model = new Balance();
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();

        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }


        if ($model->load(Yii::$app->request->post())) {
            if($model->save(false)){
                //class handling out for json string
                $ref_id->table = Helper::EXPENSES;
                $ref_id->id = $model->id;
                //update balance table for new update
                $bal_model->bank_amount = $balance['bank_amount'];
                $bal_model->cash_amount = $balance['cash_amount']-$model->amount;
                $bal_model->ref_id = json_encode($ref_id);
                $bal_model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateVoucher($id)
    {
        $expenses = Expenses::findOne($id);
        $model = new Voucher();
        $model->paid_to = $expenses->paid_to;
        $model->amount = $expenses->amount;
        $model->date = $expenses->date;
        $model->information = $expenses->description;
        if ($model->load(Yii::$app->request->post())) {

            //var_dump($model);exit();
            if($model->save() && $model->validate()){
                $expenses->status=2;
                $expenses->save(false);
                return $this->render('voucher_slip', ['model' => $model]);
            }
            return $this->redirect(['index']);
        }else{
            return $this->render('voucher',[
                'model' => $model,
                'id' => $id
            ]);
        }

    }

    /**
     * Updates an existing Expenses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ref_id = new RefId();
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        $bal_model = new Balance();
        $prev_amount = $model->amount;
        if ($model->load(Yii::$app->request->post())) {
            if($model->save() && $model->validate()){
                if($model->amount > $prev_amount){
                    $bal_model->bank_amount = $balance['cash_amount']-($model->amount-$prev_amount);
                }elseif ($prev_amount > $model->amount){
                    $bal_model->bank_amount = $balance['cash_amount']+($prev_amount - $model->amount);
                }else{
                    $bal_model->bank_amount = $balance["cash_amount"];
                }
                $ref_id->id = $model->id;
                $ref_id->table = Helper::EXPENSES;
                $bal_model->ref_id = json_encode($ref_id);
                $bal_model->bank_amount = $balance['bank_amount'];
                $bal_model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Expenses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDeleteExpenses()
    {
        $id=$_POST['id'];
        $model = Expenses::findOne($id);
        $model->status = 0;
        if($model->save(false)) {
            $ref_id = new RefId();
            $bal_model = new Balance();
            $model = $this->findModel($id);
            $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
            $ref_id->id = $model->id;
            $ref_id->table = Helper::EXPENSES;
            $bal_model->ref_id = json_encode($ref_id);
            $bal_model->bank_amount = $balance['bank_amount'] ;
            $bal_model->cash_amount = $balance['cash_amount']+$model->amount;
            $bal_model->save();
            return $this->redirect(['index']);
        }

        return $this->redirect(['index']);

    }
    
    /**
     * Finds the Expenses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expenses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Expenses::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionMethodValidate($id)
    {
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
       if($id == "cash"){
           return $balance["cash_amount"];
       }else{
           return $balance["bank_amount"];
       }
    }
    public function actionSalaryslip()
    {
     return $this->render('salaryslip');
    }

}
