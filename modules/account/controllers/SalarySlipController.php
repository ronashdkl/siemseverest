<?php

namespace app\modules\account\controllers;

use app\models\Balance;
use app\models\RefId;
use app\component\Helper;
use app\modules\account\models\Employee;
use app\modules\account\models\Tax;
use Codeception\PHPUnit\ResultPrinter\HTML;
use function GuzzleHttp\Psr7\copy_to_string;
use Yii;
use app\models\SalarySlip;
use app\models\search\SalarySlipSearch as SalarySlipSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

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
    //provides total tax and tax of each months
    public function actionTax()
    {
        if(Yii::$app->request->post()){
            $start_date= @$_POST['start_date'];
            $end_date= @$_POST['end_date'];
            $salary_slips = SalarySlip::find()->select(['date','paid_to', 'tax_amount'=>'SUM(tax_amount)'])
                ->where(['BETWEEN', 'date' ,$start_date,$end_date])
                ->groupBy(['YEAR(date)','MONTH(date)' ])->all();
            $total_tax =SalarySlip::find()
                ->where(['between', 'date', $start_date, $end_date ])->sum('tax_amount');
            return $this->render('tax',['total_tax'=>$total_tax,'salary_slips'=>$salary_slips,'start_date'=>$start_date, 'end_date'=>$end_date]);
        }else{
            $date = date('Y-m-d');
            $connection = Yii::$app->getDb();
            $total_tax =SalarySlip::find()
                ->where(['between', 'date', $date, $date ])->sum('tax_amount');
            $total_tax = SalarySlip::find()
                ->where([ 'date'=> $date ])->sum('tax_amount');
            $salary_slips = SalarySlip::find()->select(['date','paid_to', 'tax_amount'=>'SUM(tax_amount)'])
                ->where(['BETWEEN', 'date' ,$date,$date])
                ->groupBy(['YEAR(date)','MONTH(date)' ])->all();
            return $this->render('tax',['total_tax'=>$total_tax,'salary_slips'=>$salary_slips,'start_date'=>$date,'end_date'=>$date]);
        }

    }

    //provides tax details of each months
    public function actionTaxDetails(){
        $date = date_parse_from_format("Y-m-d", @$_GET['d']);
        $salary_slips = SalarySlip::findAll(['YEAR(date)'=>$date["year"],'MONTH(date)'=>$date["month"]]);
        return $this->render('tax_details',['salary_slips'=>$salary_slips]);
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
    public function actionReport($id){
        $model= $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('print_salaryslip',['model'=>$model]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_BLANK,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['SIEMS PAYSLIP'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
