<?php

namespace app\modules\account\controllers;

use Yii;
use app\modules\account\models\Withdraw;
use app\modules\account\models\WithdrawSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Balance;
use app\models\RefId;
use app\component\Helper;

/**
 * WithdrawController implements the CRUD actions for Withdraw model.
 */
class WithdrawController extends Controller
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
     * Lists all Withdraw models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WithdrawSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Withdraw();
        $data = Withdraw::findAll(['status'=> 1]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Withdraw model.
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
     * Creates a new Withdraw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Withdraw();
        $ref_id = new RefId();
        $bal_model = new Balance();
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save() && $model->validate()){
                //class handling out for json string
                $ref_id->table = Helper::WITHDRAW;
                $ref_id->id = $model->id;
                //update balance table for new update
                $bal_model->bank_amount = $balance['bank_amount']-$model->amount;
                $bal_model->cash_amount = $balance['cash_amount']+$model->amount;
                $bal_model->ref_id = json_encode($ref_id);
                $bal_model->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Withdraw model.
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->amount > $prev_amount){
                $bal_model->bank_amount = $balance['bank_amount']-($model->amount-$prev_amount);
                $bal_model->cash_amount = $balance['cash_amount']+($model->amount-$prev_amount);
            }elseif ($prev_amount > $model->amount){
                $bal_model->bank_amount = $balance['bank_amount']+($prev_amount - $model->amount);
                $bal_model->cash_amount = $balance['cash_amount']-($prev_amount - $model->amount);
            }else{
                $bal_model->bank_amount = $balance["bank_amount"];
                $bal_model->cash_amount = $balance["cash_amount"];
            }
            $ref_id->id = $model->id;
            $ref_id->table = Helper::WITHDRAW;
            $bal_model->ref_id = json_encode($ref_id);
            $bal_model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Withdraw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteWithdraw()
    {
        $id=$_POST['id'];
        $model = Withdraw::findOne($id);
        $model->status = 0;
        $model->save(false);
        return $this->redirect(['index']);

    }

    /**
     * Finds the Withdraw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Withdraw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Withdraw::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
