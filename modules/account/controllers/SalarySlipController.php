<?php

namespace app\modules\account\controllers;

use app\models\Balance;
use app\models\RefId;
use app\component\Helper;
use app\modules\account\models\Employee;
use app\modules\account\models\Tax;
use Codeception\PHPUnit\ResultPrinter\HTML;
use Yii;
use app\models\SalarySlip;
use app\models\search\SalarySlipSearch as SalarySlipSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VoucherController implements the CRUD actions for Voucher model.
 */
class SalarySlipController extends Controller
{
    public $layout ='admin';
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
     * Lists all Voucher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalarySlipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = SalarySlip::find()->all();
        $model = new SalarySlip();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Voucher model.
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
     * Creates a new Voucher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SalarySlip();
        $ref_id = new RefId();
        $bal_model = new Balance();
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save() && $model->validate()){
                //class handling out for json string
                $ref_id->table = Helper::VOUCHER;
                $ref_id->id = $model->id;
                //update balance table for new update
                $bal_model->bank_amount = $balance['bank_amount']-$model->amount;
                $bal_model->cash_amount = $balance['cash_amount'];
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

    public function actionReceiverInformation($id){

        $employee = Employee::findOne($id);
        if( is_numeric($id) && $employee->sallery!=null) {
            $sallery = $employee->sallery;
            $taxes = Tax::find()->all();
            $tax= 0;
            foreach($taxes as $tax){
                if( ($tax['start_range'] <= $sallery) && ($sallery <= $tax['end_range']))
                    $tax = $tax['tax_perc'];
                else
                    $tax = Helper::TAX;
            }

            $taxAmount = $tax * $sallery;
            $calculate = $sallery - $taxAmount;
            $amount = [];
            $amount['tax'] = $tax."%";
            $amount['taxAmount'] = $taxAmount;
            $amount['payAmount'] = $calculate;
            $amount['totalAmount'] = $sallery;
            $amount['avatar']=  $employee->image;
            $amount['job_post'] = $employee->job_post;
            echo json_encode($amount);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Updates an existing Voucher model.
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
                    $bal_model->bank_amount = $balance['bank_amount']-($model->amount-$prev_amount);
                }elseif ($prev_amount > $model->amount){
                    $bal_model->bank_amount = $balance['bank_amount']+($prev_amount - $model->amount);
                }else{
                    $bal_model->bank_amount = $balance["bank_amount"];
                }
                $ref_id->id = $model->id;
                $ref_id->table = Helper::VOUCHER;
                $bal_model->ref_id = json_encode($ref_id);
                $bal_model->cash_amount = $balance['cash_amount'];
                $bal_model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionTax()
    {
        return $this->render('tax');
    }

    /**
     * Deletes an existing Voucher model.
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
     * Finds the Voucher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Voucher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SalarySlip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
