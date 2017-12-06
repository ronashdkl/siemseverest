<?php

namespace app\modules\rbac\controllers;

use Yii;
use app\models\User;
use app\modules\rbac\models\AuthAssignment;
use app\modules\rbac\models\AuthItem;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	/**
	 * Lists all User models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single User model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);
		$authAssignments = AuthAssignment::find()->where([
			'user_id' => $model->id,
		])->column();

		$authItems = ArrayHelper::map(
			AuthItem::find()->where([
				'type' => 1,
			])->asArray()->all(),
			'name', 'name');

		$authAssignment = new AuthAssignment([
			'user_id' => $model->id,
		]);

		if (Yii::$app->request->post()) {
			$authAssignment->load(Yii::$app->request->post());
			// delete all role
			AuthAssignment::deleteAll(['user_id' => $model->id]);
			if (is_array($authAssignment->item_name)) {
				foreach ($authAssignment->item_name as $item) {
					if (!in_array($item, $authAssignments)) {
						$authAssignment2 = new AuthAssignment([
							'user_id' => $model->id,
						]);
						$authAssignment2->item_name = $item;
						$authAssignment2->created_at = time();
						$authAssignment2->save();

						$authAssignments = AuthAssignment::find()->where([
							'user_id' => $model->id,
						])->column();
					}
				}
			}
			Yii::$app->session->setFlash('success', 'Data tersimpan');
		}
		$authAssignment->item_name = $authAssignments;
		return $this->render('view', [
			'model' => $model,
			'authAssignment' => $authAssignment,
			'authItems' => $authItems,
		]);
	}

	/**
	 * Creates a new User model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new User();
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
	}

	/**
	 * Updates an existing User model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
	}

	/**
	 * Deletes an existing User model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$authAssignments = AuthAssignment::find()->where([
			'user_id' => $model->id,
		])->all();
		foreach ($authAssignments as $authAssignment) {
			$authAssignment->delete();
		}

		Yii::$app->session->setFlash('success', 'Delete success');
		$model->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the User model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return User the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = User::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
