<?php

namespace app\modules\account\controllers;

use app\component\Helper;
use app\models\Balance;
use app\models\RefId;
use Yii;
use app\modules\account\models\Income;
use app\modules\account\models\IncomeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IncomeController implements the CRUD actions for Income model.
 */
class IncomeController extends Controller
{
    //layouts for income
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
     * Lists all Income models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IncomeSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $data = Income::findAll(['status'=>1]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'data' => $data,
        ]);
    }

    /**
     * Displays a single Income model.
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
     * Creates a new Income model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Income();
        $ref_id = new RefId();
        $bal_model = new Balance();
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        if ($model->load(Yii::$app->request->post())) {

            if($model->save() && $model->validate()){

                //handling out for json string
                $ref_id->table = Helper::INCOME;
                $ref_id->id = $model->id;
                //update balance table for new update
                $bal_model->bank_amount = $balance['bank_amount']+$model->amount;
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

    /**
     * Updates an existing Income model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $bal_model = new Balance();
        $ref_id = new RefId();
        $model = $this->findModel($id);
        $prev_amount = $model->amount;  //getting previous amount
        $balance = Balance::find()->orderBy(['id' => SORT_DESC])->one();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                if($model->amount > $prev_amount){
                    $bal_model->bank_amount = $balance['bank_amount']+($model->amount-$prev_amount);
                }elseif ($prev_amount > $model->amount){
                    $bal_model->bank_amount = $balance['bank_amount']-($prev_amount - $model->amount);
                }else{
                    $bal_model->bank_amount = $balance["bank_amount"];
                }
                $ref_id->id = $model->id;
                $ref_id->table = Helper::INCOME;
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

    /**
     * Deletes an existing Income model.
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
     * Finds the Income model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Income the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Income::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
